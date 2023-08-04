<?php
class ClusteringKMean
{
      private $objek = array();
      private $centroidCluster = null;
      private $cekObjCluster = null;

      public function __construct($obj, $cnt, $nama)
      {


            $this->centroidCluster = $cnt;
            for ($i = 0; $i < count($obj); $i++) {
                  $this->objek[$i] = new objek($obj[$i], $nama[$i]);
                  $this->cekObjCluster[$i] = 0;
            }
      }


      public function setClusterObjek2($itr)
      {

            echo "<table class='table '>
                        <tr><th colspan='100'>ITERASI " . $itr . "</th></tr>
						<tr><th>Objek</th>";
            for ($i = 0; $i < count($this->objek[0]->data); $i++) {
                  echo "<th>Data " . ($i + 1) . "</th>";
            }
            for ($j = 0; $j < count($this->centroidCluster); $j++) {
                  echo "<th>Cluster " . ($j + 1) . "</th>";
            }
            echo "</tr>";


            for ($i = 0; $i < count($this->objek); $i++) {
                  $this->objek[$i]->setCluster($this->centroidCluster);
                  echo "<tr><td>Objek " . ($i + 1) . "</td>";
                  for ($j = 0; $j < count($this->objek[$i]->data); $j++)
                        echo "<td>" . $this->objek[$i]->data[$j] . "</td>";

                  for ($j = 0; $j < count($this->centroidCluster); $j++) {
                        if ($j == $this->objek[$i]->getCluster())
                              echo "<td style='color:green'><i class='bi bi-check-lg'></i></td>";
                        else
                              echo "<td style='color:red'><i class='bi bi-x'></i></td>";
                  }
                  echo "</tr>";
            }
            echo "</table><br><br>";

            //cek
            $cek = TRUE;
            for ($i = 0; $i < count($this->cekObjCluster); $i++) {
                  if ($this->cekObjCluster[$i] != $this->objek[$i]->getCluster()) {
                        $cek = FALSE;
                        break;
                  }
            }

            if ((!($cek)) && ($itr < 20)) {
                  for ($i = 0; $i < count($this->cekObjCluster); $i++) {
                        $this->cekObjCluster[$i] = $this->objek[$i]->getCluster();
                  }
                  $this->setCentroidCluster();
                  $this->setClusterObjek($itr + 1);
            } else {
                  echo "<center><h2>Centroid Akhir</h2></center>";
                  echo "<table class='table' >";
                  for ($i = 0; $i < count($this->centroidCluster); $i++) {
                        echo "<tr><td>Cluster " . ($i + 1) . " </td>";
                        for ($j = 0; $j < count($this->centroidCluster[$i]); $j++) {
                              echo "<td>" . $this->centroidCluster[$i][$j] . "</td>";
                        }
                        echo "</tr>";
                  }
                  echo "</table><br><br><br>";
            }
      }

      public function setClusterObjek()
      {

            $all_nilai = [];
            $akhir = [];
            $itr = 1;
            $run = true;

            while ($run) {
                  // $header = ["Objek"];
                  // for ($i = 0; $i < count($this->objek[0]->data); $i++) {
                  //       $header[] = "Data " . ($i + 1);
                  // }
                  $body = [];
                  for ($j = 0; $j < count($this->centroidCluster); $j++) {
                        // $header[] = "Cluster " . ($j + 1);
                        $body[$j] = [];
                  }


                  for ($i = 0; $i < count($this->objek); $i++) {
                        $this->objek[$i]->setCluster($this->centroidCluster);
                        // for ($j = 0; $j < count($this->objek[$i]->data); $j++)
                        //       $_t[] = $this->objek[$i]->data[$j];

                        for ($j = 0; $j < count($this->centroidCluster); $j++) {
                              if ($j == $this->objek[$i]->getCluster())
                                    $body[$j][] = $this->objek[$i]->nama;
                        }
                  }

                  $all_nilai[] = ["body" => $body];
                  $cek = TRUE;
                  for ($i = 0; $i < count($this->cekObjCluster); $i++) {
                        if ($this->cekObjCluster[$i] != $this->objek[$i]->getCluster()) {
                              $cek = FALSE;
                              break;
                        }
                  }
                  if ((!($cek)) && ($itr < 20)) {
                        for ($i = 0; $i < count($this->cekObjCluster); $i++) {
                              $this->cekObjCluster[$i] = $this->objek[$i]->getCluster();
                        }
                        $this->setCentroidCluster();
                        $itr += 1;
                  } else {

                        for ($i = 0; $i < count($this->centroidCluster); $i++) {

                              $akhir[$i + 1] = [];
                              for ($j = 0; $j < count($this->centroidCluster[$i]); $j++) {
                                    $akhir[$i + 1][] = $this->centroidCluster[$i][$j];
                              }
                        }
                        $run = false;
                  }
            }

            //renderakhir

            echo "<table class='table '>";
            $iitr = count($all_nilai) - 1;
            echo "<tr><th colspan='100'>Hasi Akhir " . ($iitr + 1) . "</th></tr>";
            $dt = $all_nilai[$iitr];
            // var_dump($dt);die;
            echo "<tr>";
            $max_nil = 0;
            $max_idx = 0;
            foreach ($dt['body'] as $hd => $_h) {
                  if ($max_nil < count($_h)) {
                        $max_nil = count($_h);
                        $max_idx = $hd;
                  }
                  echo "<th > Cluster" . ($hd + 1) . "</th>";
            }
            echo "</tr>";
            foreach ($dt['body'][$max_idx] as $idx => $bd) {
                  echo "<tr>";
                  foreach ($dt['body'] as $cj => $_cj) {
                        echo "<td>" . ($dt['body'][$cj][$idx] ? $dt['body'][$cj][$idx] : '') . "</td>";
                  }
                  echo "</tr>";
            }
            echo "</table><br><br>";

            //render centroid akhir

            echo "<center><h2>Centroid Akhir</h2></center>";
            echo "<table class='table' >";

            foreach ($akhir as $ctr => $akr) {
                  echo "<tr>";
                  echo "<th> Cluster" . $ctr . "</th>";
                  foreach ($akr as $kr) {
                        echo "<td>" . $kr . "</td>";
                  }
                  echo "</tr>";
            }

            echo "</table><br><br><br>";
            die;


            //cek



      }

      private function setCentroidCluster()
      {
            for ($i = 0; $i < count($this->centroidCluster); $i++) {
                  $countObj = 0;
                  $x = array();
                  for ($j = 0; $j < count($this->objek); $j++) {
                        if ($this->objek[$j]->getCluster() == $i) {
                              for ($k = 0; $k < count($this->objek[$j]->data); $k++) {
                                    $x[$k] += $this->objek[$j]->data[$k];
                              }
                              $countObj++;
                        }
                  }
                  for ($k = 0; $k < count($this->centroidCluster[$i]); $k++) {
                        if ($countObj > 0)
                              $this->centroidCluster[$i][$k] = $x[$k] / $countObj;
                        else {
                              echo "<font color='red'>Terdapat ketidak sesuai Nilai Awal Cluster</font><br>";
                              break;
                        }
                  }
            }
      }
}
