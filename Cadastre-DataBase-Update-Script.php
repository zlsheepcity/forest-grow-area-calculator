<?php
/**
  Процесс работы:
  - распаковывал архив Parcel.zip с данными кадастра
  - по очереди менял имена файлов (ниже в коде)
  - запускал этот скрипт из папки командой
    php -S localhost:8000
  - на экране и в консоли браузера можно наблюдать активность
  - от получаса до двух часов на файл, с локального компа
**/
?>

<?php
    // Это вспомогательные настройки
    // чтобы запускать скрипт после ошибок
    // Поставлены значения по умолчанию: всё прочитать/всё записать

    ini_set('max_execution_time', '420');
    $useDBWrite      = 1;
    $useTargetMatch  = 0; $listTargetMatch = '62460050097'; // = start from id
    $useCounterLimit = 0; $counterDBUpdatesLimit = 10; // = stop after x records
?>

<?php
    // В этом блоке вручную меняю имена файлов для обработки.
    // Подрузамевается, что распакованный архив из кадастра лежит в папке.

    // Data Source 2023.8.8
    $fpath = '../data8.8/Parcel/';
    $ftype = '.xml';
      $fid = '0001000_20230801_84334/01E3014F-AB76-1B8F-E064-B4B52F56F038'; //55 DONE
    //$fid = '0002000_20230801_84335/01E3014F-AB78-1B8F-E064-B4B52F56F038'; //17 DONE
    //$fid = '0003000_20230801_84336/01E3014F-AB7A-1B8F-E064-B4B52F56F038'; //13 DONE
    //$fid = '0004000_20230801_84337/01E3014F-AB7C-1B8F-E064-B4B52F56F038'; //12 DONE
    //$fid = '0005000_20230801_84338/01E3014F-AB7E-1B8F-E064-B4B52F56F038'; //8  DONE
    //$fid = '0006000_20230801_84339/01E3014F-AB80-1B8F-E064-B4B52F56F038'; //5  DONE
    //$fid = '0007000_20230801_84340/01E3014F-AB82-1B8F-E064-B4B52F56F038'; //8  DONE
    //$fid = '0020000_20230801_84341/01E3014F-AB84-1B8F-E064-B4B52F56F038'; //27 DONE
    //$fid = '0021000_20230801_84342/01E3014F-AB86-1B8F-E064-B4B52F56F038'; //19 DONE
    //$fid = '0022000_20230801_84343/01E3014F-AB88-1B8F-E064-B4B52F56F038'; //52 DONE
    //$fid = '0023000_20230801_84344/01E3014F-AB8A-1B8F-E064-B4B52F56F038'; //15 DONE
    //$fid = '0024000_20230801_84345/01E3014F-AB8C-1B8F-E064-B4B52F56F038'; //30 DONE
    //$fid = '0025000_20230801_84346/01E3014F-AB8E-1B8F-E064-B4B52F56F038'; //36 DONE
    //$fid = '0026000_20230801_84347/01E3014F-AB90-1B8F-E064-B4B52F56F038'; //34 DONE
    //$fid = '0027000_20230801_84348/01E3014F-AB92-1B8F-E064-B4B52F56F038'; //43 DONE
    //$fid = '0028000_20230801_84349/01E3014F-AB94-1B8F-E064-B4B52F56F038'; //22 DONE
    //$fid = '0029000_20230801_84350/01E3014F-AB96-1B8F-E064-B4B52F56F038'; //21 DONE
    //$fid = '0030000_20230801_84351/01E3014F-AB98-1B8F-E064-B4B52F56F038'; //27 DONE
    //$fid = '0031000_20230801_84352/01E3014F-AB9A-1B8F-E064-B4B52F56F038'; //38 DONE
    //$fid = '0032000_20230801_84353/01E3014F-AB9C-1B8F-E064-B4B52F56F038'; //42 DONE
    //$fid = '0033000_20230801_84354/01E3014F-AB9E-1B8F-E064-B4B52F56F038'; //27 DONE
    //$fid = '0034000_20230801_84355/01E3014F-ABA0-1B8F-E064-B4B52F56F038'; //20 DONE
    //$fid = '0035000_20230801_84356/01E3014F-ABA2-1B8F-E064-B4B52F56F038'; //34 DONE
    //$fid = '0036000_20230801_84357/01E3014F-ABA4-1B8F-E064-B4B52F56F038'; //10 DONE
    //$fid = '0037000_20230801_84358/01E3014F-ABA6-1B8F-E064-B4B52F56F038'; //37 DONE
    //$fid = '0038000_20230801_84359/01E3014F-ABA8-1B8F-E064-B4B52F56F038'; //32 DONE
    //$fid = '0039000_20230801_84360/01E3014F-ABAA-1B8F-E064-B4B52F56F038'; //17 DONE
    //$fid = '0040000_20230801_84361/01E3014F-ABAC-1B8F-E064-B4B52F56F038'; //37 DONE
    //$fid = '0041000_20230801_84362/01E3014F-ABAE-1B8F-E064-B4B52F56F038'; //15 DONE
    //$fid = '0042000_20230801_84363/01E3014F-ABB0-1B8F-E064-B4B52F56F038'; //24 DONE
    //$fid = '0043000_20230801_84364/01E3014F-ABB2-1B8F-E064-B4B52F56F038'; //53 DONE
    //$fid = '0044000_20230801_84365/01E3014F-ABB4-1B8F-E064-B4B52F56F038'; //20 DONE
    //$fid = '0045000_20230801_84366/01E3014F-ABB6-1B8F-E064-B4B52F56F038'; //9  DONE
    //$fid = '0046000_20230801_84367/01E3014F-ABB8-1B8F-E064-B4B52F56F038'; //22 DONE
    //$fid = '0047000_20230801_84368/01E3014F-ABBA-1B8F-E064-B4B52F56F038'; //12 DONE
    //$fid = '0048000_20230801_84369/01E3014F-ABBC-1B8F-E064-B4B52F56F038'; //20 DONE
    //$fid = '0049000_20230801_84370/01E3014F-ABBE-1B8F-E064-B4B52F56F038'; //20 DONE
    //$fid = '0051000_20230801_84371/01E3014F-ABC0-1B8F-E064-B4B52F56F038'; //32 DONE
    //$fid = '0052000_20230801_84372/01E3014F-ABC2-1B8F-E064-B4B52F56F038'; //34 DONE
    //$fid = '0053000_20230801_84373/01E3014F-ABC4-1B8F-E064-B4B52F56F038'; //8  DONE
    //$fid = '0054000_20230801_84374/01E3014F-ABC6-1B8F-E064-B4B52F56F038'; //37 DONE
    //$fid = '0055000_20230801_84375/01E3014F-ABC8-1B8F-E064-B4B52F56F038'; //4  DONE
    //$fid = '0056000_20230801_84376/01E3014F-ABCA-1B8F-E064-B4B52F56F038'; //18 DONE

    $loadingPath = $fpath.$fid.$ftype;
?>

<?php
    // Create connection $DBConn
    // Данные стёрты
    // Оригинальный файл положил в папку calculator, к файлам проекта

    $cadasterDB_host = "";
    $cadasterDB_port = "";
    $cadasterDB_user = "";
    $cadasterDB_pass = "";
    $cadasterDB_name = "";
    $cadasterDB_tab1 = "";

    $DBConn = new mysqli(
        $cadasterDB_host,
        $cadasterDB_user,
        $cadasterDB_pass,
        $cadasterDB_name,
        $cadasterDB_port
    );

    if ($DBConn->connect_error) {
        echo '<div class="co2DecoratedSection2 devbox">';
        echo 'Cannot connect cadaster database, #CO2Msg924';
        echo '</div>';
        die("DB Connection failed: " . $DBConn->connect_error);
    }
?>

<?php
    // Парсинг XML
    // Перебираю поля, запускаю запросы, вывожу логи.

    // Примерная структура нужных полей:
    /**
      xml
        ParcelItemList
          ParcelItemData
            ParcelBasicData
              ParcelCadastreNr
              ParcelArea
            LandPurposeList
              LandPurposeData
                LandPurposeArea
                LandPurposeExplicationData
                  AgricultTotal
                  Bushes
    **/

    // Структура SQL запросов выделена в коде.

    $xml = simplexml_load_file($loadingPath);
    echo '<h2>File: '.$loadingPath.'</h2>';

    $list = $xml->ParcelItemList->ParcelItemData;
    $listCounter = 0;
    $listTarget = false;

    echo '<h2>Listing: '.count($list).'</h2>';
    echo '<script>';
    echo ' console.time("total");';
    echo '</script>';

    $counterItems = 0;
    $counterDBUpdates = 0;
    for ($i = 0; $i < count($list); $i++) {

        $ParcelCadastreNr = $list[$i]->ParcelBasicData->ParcelCadastreNr;
        $ParcelArea       = $list[$i]->ParcelBasicData->ParcelArea;
        $sublist          = $list[$i]->LandPurposeList->LandPurposeData;

        if ($sublist) for ($ij = 0; $ij < count($sublist); $ij++) {

            $counterItems++;

            $LandPurposeKindId  = $sublist[$ij]->LandPurposeKind->LandPurposeKindId;
            $LandPurposeArea    = $sublist[$ij]->LandPurposeArea;
            $AgricultTotal      = $sublist[$ij]->LandPurposeExplicationData->AgricultTotal;
            $Bushes             = $sublist[$ij]->LandPurposeExplicationData->Bushes;

            $ParcelArea         = $ParcelArea ? $ParcelArea : 0;
            $LandPurposeArea    = $LandPurposeArea ? $LandPurposeArea : 0;
            $AgricultTotal      = $AgricultTotal ? $AgricultTotal : 0;
            $Bushes             = $Bushes ? $Bushes : 0;


            $sqlFindExist = "SELECT record_id FROM `".$cadasterDB_tab1."`";
            $sqlFindExist.= " WHERE ";
            $sqlFindExist.= " ParcelCadastreNr = '".$ParcelCadastreNr."'";
            $sqlFindExist.= " AND ";
            $sqlFindExist.= " LandPurposeKindId = '".$LandPurposeKindId."'";
            $sqlFindExist.= ";";

            $sqlCreateBlanc = "INSERT INTO `".$cadasterDB_tab1."`";
            $sqlCreateBlanc.= " ( ";
            $sqlCreateBlanc.= " ParcelCadastreNr";
            $sqlCreateBlanc.= " , ";
            $sqlCreateBlanc.= " LandPurposeKindId";
            $sqlCreateBlanc.= " ) VALUES ( ";
            $sqlCreateBlanc.= " '".$ParcelCadastreNr."'";
            $sqlCreateBlanc.= " , ";
            $sqlCreateBlanc.= " '".$LandPurposeKindId."'";
            $sqlCreateBlanc.= " ) ";
            $sqlCreateBlanc.= ";";

            $sqlUpdate = "UPDATE `".$cadasterDB_tab1."`";
            $sqlUpdate.= " SET ";
            $sqlUpdate.= " ParcelArea = '".$ParcelArea."'";
            $sqlUpdate.= " , ";
            $sqlUpdate.= " LandPurposeArea = '".$LandPurposeArea."'";
            $sqlUpdate.= " , ";
            $sqlUpdate.= " AgricultTotal = '".$AgricultTotal."'";
            $sqlUpdate.= " , ";
            $sqlUpdate.= " Bushes = '".$Bushes."'";
            $sqlUpdate.= " WHERE ";
            $sqlUpdate.= " ParcelCadastreNr = '".$ParcelCadastreNr."'";
            $sqlUpdate.= " AND ";
            $sqlUpdate.= " LandPurposeKindId = '".$LandPurposeKindId."'";
            $sqlUpdate.= ";";

            // run record
            if ($ParcelCadastreNr==$listTargetMatch) $listTarget = true;
            $allowDBWrite = $useDBWrite;
            if ($useTargetMatch) $allowDBWrite = $allowDBWrite && $listTarget;
            if ($useCounterLimit) $allowDBWrite = $allowDBWrite && $counterDBUpdates < $counterDBUpdatesLimit;

            if ($allowDBWrite) {

                $sqlResFindExist = $DBConn->query($sqlFindExist);
                if ($sqlResFindExist->num_rows < 1) {

                    $timerName = 'item'.$counterItems.'-'.$ParcelCadastreNr.'-'.$LandPurposeKindId;
                    echo '<script>';
                    echo ' console.time("'.$timerName.'");';
                    echo '</script>';

                    // create record
                    $sqlResCreateBlanc = $DBConn->query($sqlCreateBlanc);

                    // update data
                    $sqlResUpdate = $DBConn->query($sqlUpdate);
                    $listCounter++;

                    // report
                    echo "<small>";
                    echo $sqlUpdate.'<br>';
                    echo "</small>";

                echo '<script>';
                echo ' console.timeEnd("'.$timerName.'");';
                echo '</script>';

                }
            }

            // render
            echo 'Item:   ' . $counterItems . ', ';
            echo 'CadrNr: ' . $ParcelCadastreNr . ', ';
            echo 'LandId: ' . $LandPurposeKindId . '<br>';


        } else { echo 'Empty sublist: '.$ParcelCadastreNr; }
        echo '<br>';
    }
    echo '<script>';
    echo ' console.timeEnd("total");';
    echo '</script>';
?>

<?php
    // Exit connection $DBConn
    $DBConn->close();
?>
