<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sebaran;
use App\Models\DetailCluster;
use Illuminate\Support\Facades\DB;

class ResultController extends Controller
{
    public function index()
    {
        $nav = "active";
        return view('dashboard.hitung.index', compact('nav'));
    }

    public function detail()
    {
        // get all data sebaran
        $collectData = Sebaran::all();

        // get data random from database
        $getDataRandom = Sebaran::inRandomOrder()->limit(3)->get();

        // $treatedCluster1 = $getDataRandom[0]->treated;
        // $confirmCluster1 = $getDataRandom[0]->confirmation;
        // $helaedCluster1 = $getDataRandom[0]->healed;
        // $dieCluster1 = $getDataRandom[0]->die;

        // $treatedCluster2 = $getDataRandom[1]->treated;
        // $confirmCluster2 = $getDataRandom[1]->confirmation;
        // $helaedCluster2 = $getDataRandom[1]->healed;
        // $dieCluster2 = $getDataRandom[1]->die;

        // $treatedCluster3 = $getDataRandom[2]->treated;
        // $confirmCluster3 = $getDataRandom[2]->confirmation;
        // $helaedCluster3 = $getDataRandom[2]->healed;
        // $dieCluster3 = $getDataRandom[2]->die;

        $treatedCluster1 = 1592;
        $confirmCluster1 = 1230;
        $helaedCluster1 = 6771;
        $dieCluster1 = 342;

        $treatedCluster2 = 32778.76;
        $confirmCluster2 = 135909.37;
        $helaedCluster2 = 137147.00;
        $dieCluster2 = 8392.21;

        $treatedCluster3 = 211221;
        $confirmCluster3 = 1141024;
        $helaedCluster3 = 1121197;
        $dieCluster3 = 96912;


        $looping = TRUE;
        $count = 0;

        while ($looping == TRUE) {
            foreach ($collectData as $key => $value) {
                $distanceCluster1 = sqrt(pow(($value->treated - $treatedCluster1), 2) + 
                                    pow(($value->confirmation - $confirmCluster1), 2) + 
                                    pow(($value->healed - $helaedCluster1), 2) +
                                    pow(($value->die - $dieCluster1), 2));

                $distanceCluster2 = sqrt(pow(($value->treated - $treatedCluster2), 2) + 
                                    pow(($value->confirmation - $confirmCluster2), 2) + 
                                    pow(($value->healed - $helaedCluster2), 2) +
                                    pow(($value->die - $dieCluster2), 2));
                
                $distanceCluster3 = sqrt(pow(($value->treated - $treatedCluster3), 2) + 
                                    pow(($value->confirmation - $confirmCluster3), 2) + 
                                    pow(($value->healed - $helaedCluster3), 2) +
                                    pow(($value->die - $dieCluster3), 2));

                $findMinResult = min($distanceCluster1, $distanceCluster2, $distanceCluster3);

                if ($findMinResult == $distanceCluster1) {
                    DB::table('sebarans')->where('id', $value->id)->update([
                        'cluster_id' => 1,
                    ]);
                }
                else if($findMinResult == $distanceCluster2){
                    DB::table('sebarans')->where('id', $value->id)->update([
                        'cluster_id' => 2,
                    ]);
                }
                else if($findMinResult == $distanceCluster3){
                    DB::table('sebarans')->where('id', $value->id)->update([
                        'cluster_id' => 3,
                    ]);
                }
            }

            // hitung ulang centroid
            $getDataCluster1 = Sebaran::where('cluster_id', 1)->get();
            $getDataCluster2 = Sebaran::where('cluster_id', 2)->get();
            $getDataCluster3 = Sebaran::where('cluster_id', 3)->get();

            // hitung ulang centroid cluster 1
            $treatedc1 = 0;
            $confirmcc1 = 0;
            $healedc1 = 0;
            $diec1 = 0;
            $totalC1 = Sebaran::where('cluster_id', 1)->count();

            foreach ($getDataCluster1 as $value) {
                $treatedc1 += $value->treated;
                $confirmcc1 += $value->confirmation;
                $healedc1 += $value->healed;
                $diec1 += $value->die;
            }

            $avgTreatedC1 = round($treatedc1 / $totalC1, 2);
            $avgConfirmC1 = round($confirmcc1 / $totalC1, 2);
            $avgHealedC1 = round($healedc1 / $totalC1, 2);
            $avgDieC1 = round($diec1 / $totalC1, 2);
            
            // hitung ulang centroid cluster 2
            $treatedc2 = 0;
            $confirmcc2 = 0;
            $healedc2 = 0;
            $diec2 = 0;
            $totalC2 = Sebaran::where('cluster_id', 2)->count();

            foreach ($getDataCluster2 as $value) {
                $treatedc2 += $value->treated;
                $confirmcc2 += $value->confirmation;
                $healedc2 += $value->healed;
                $diec2 += $value->die;
            }

            $avgTreatedC2 = round($treatedc2 / $totalC2, 2);
            $avgConfirmC2 = round($confirmcc2 / $totalC2, 2);
            $avgHealedC2 = round($healedc2 / $totalC2, 2);
            $avgDieC2 = round($diec2 / $totalC2, 2);
            
            // hitung ulang centroid cluster 3
            $treatedc3 = 0;
            $confirmcc3 = 0;
            $healedc3 = 0;
            $diec3 = 0;
            $totalC3 = Sebaran::where('cluster_id', 3)->count();

            foreach ($getDataCluster3 as $value) {
                $treatedc3 += $value->treated;
                $confirmcc3 += $value->confirmation;
                $healedc3 += $value->healed;
                $diec3 += $value->die;
            }

            $avgTreatedC3 = round($treatedc3 / $totalC3, 2);
            $avgConfirmC3 = round($confirmcc3 / $totalC3, 2);
            $avgHealedC3 = round($healedc3 / $totalC3, 2);
            $avgDieC3 = round($diec3 / $totalC3, 2);
            
            if ($treatedCluster1 == $avgTreatedC1 && $confirmCluster1 == $avgConfirmC1 && 
                $helaedCluster1 == $avgHealedC1 && $dieCluster1 == $avgDieC1 && 
                $treatedCluster2 == $avgTreatedC2 && $confirmCluster2 == $avgConfirmC2 && 
                $helaedCluster2 == $avgHealedC2 && $dieCluster2 == $avgDieC2 &&
                $treatedCluster3 == $avgTreatedC3 && $confirmCluster3 == $avgConfirmC3 && 
                $helaedCluster3 == $avgHealedC3 && $dieCluster3 == $avgDieC3
                ) {
                    $count -= 1;
                    $looping = False;
            } else {
                $treatedCluster1 = $avgTreatedC1;
                $confirmCluster1 = $avgConfirmC1;
                $helaedCluster1 = $avgHealedC1;
                $dieCluster1 = $avgDieC1;

                $treatedCluster2 = $avgTreatedC2;
                $confirmCluster2 = $avgConfirmC2;
                $helaedCluster2 = $avgHealedC2;
                $dieCluster2 = $avgDieC2;

                $treatedCluster3 = $avgTreatedC3;
                $confirmCluster3 = $avgConfirmC3;
                $helaedCluster3 = $avgHealedC3;
                $dieCluster3 = $avgDieC3;

                $count ++;
            }
        }

        $nav = "active";
        $data = Sebaran::all();

        $provinsisC1 = [];
        $resultC1 = [];

        $provinsisC2 = [];
        $resultC2 = [];

        $provinsisC3 = [];
        $resultC3 = [];

        foreach ($data as $value) {
            if ($value->cluster_id == 1) {
                $provinsisC1[] = $value->provinsi->name;
                $resultC1[] = $value->confirmation;
            }
            elseif ($value->cluster_id == 2) {
                $provinsisC2[] = $value->provinsi->name;
                $resultC2[] = $value->confirmation;
            }
            elseif ($value->cluster_id == 3) {
                $provinsisC3[] = $value->provinsi->name;
                $resultC3[] = $value->confirmation;
            }
        }

        return view('dashboard.hitung.detail', compact('nav', 'data', 'count', 'provinsisC1',
            'resultC1', 'provinsisC2', 'resultC2', 'provinsisC3', 'resultC3'
        ));
    }
}
