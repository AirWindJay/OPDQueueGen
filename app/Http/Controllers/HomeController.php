<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\model\queue;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }


    public function queuepage()
    {
        $date = DB::SELECT("SELECT GETDATE() as dater");

        return view('queuegen', compact(
            'date'
        ));
    }


    public function onload()
    {
        $queue = queue::orderby('id', 'desc')->first();
        $determiner = DB::SELECT("SELECT determiner = CASE WHEN cast('$queue->created_at' as date) = cast(getdate() as date) THEN 1 ELSE 0 END;");
        $determiner = $determiner[0]->determiner;
        
        if($determiner == 0)
        {
            $queue1 = new queue();
            $queue1->newpat = 0;
            $queue1->oldpat = 0;
            $queue1->newpatprio = 0;
            $queue1->oldpatprio = 0;
            $queue1->save();

            $queue = $queue1;
        }

        return response()->json($queue);
    }


    public function newpatientadd()
    {
        $queue = queue::orderby('id', 'desc')->first();
        $num = $queue->newpat;
        $num++;
        $queue->newpat = $num;
        $queue->save();

        return response()->json($num);
    }
    

    public function oldpatientadd()
    {
        $queue = queue::orderby('id', 'desc')->first();
        $num = $queue->oldpat;
        $num++;
        $queue->oldpat = $num;
        $queue->save();

        return response()->json($num);
    }


    public function newpatientprioadd()
    {
        $queue = queue::orderby('id', 'desc')->first();
        $num = $queue->newpatprio;
        $num++;
        $queue->newpatprio = $num;
        $queue->save();

        return response()->json($num);
    }
    

    public function oldpatientprioadd()
    {
        $queue = queue::orderby('id', 'desc')->first();
        $num = $queue->oldpatprio;
        $num++;
        $queue->oldpatprio = $num;
        $queue->save();

        return response()->json($num);
    }
}
