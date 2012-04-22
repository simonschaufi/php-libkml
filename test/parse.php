<?php
    session_start();
    
    require('../libkml.php');
    
    function object_to_array($obj) {
        if(is_object($obj)) $obj = (array) $obj;
        if(is_array($obj)) {
            $new = array();
            foreach($obj as $key => $val) {
                $new[$key] = object_to_array($val);
            }
        }
        else $new = $obj;
        return $new;
    }
    
    function array_compare($array1, $array2) { 
        $diff = false; 
        // Left-to-right 
        foreach ($array1 as $key => $value) { 
            if (!array_key_exists($key,$array2)) { 
                $diff[0][$key] = $value; 
            } elseif (is_array($value)) { 
                 if (!is_array($array2[$key])) { 
                        $diff[0][$key] = $value; 
                        $diff[1][$key] = $array2[$key]; 
                 } else { 
                        $new = array_compare($value, $array2[$key]); 
                        if ($new !== false) { 
                             if (isset($new[0])) $diff[0][$key] = $new[0]; 
                             if (isset($new[1])) $diff[1][$key] = $new[1]; 
                        }; 
                 }; 
            } elseif ($array2[$key] !== $value) { 
                 $diff[0][$key] = $value; 
                 $diff[1][$key] = $array2[$key]; 
            }; 
     }; 
     // Right-to-left 
     foreach ($array2 as $key => $value) { 
            if (!array_key_exists($key,$array1)) { 
                 $diff[1][$key] = $value; 
            }; 
            // No direct comparsion because matching keys were compared in the 
            // left-to-right loop earlier, recursively. 
     }; 
     return $diff; 
    };
    
    
    $map = false;
    $kml_file = "parse_test.kml";
    $kml_file_url = 'http://'. $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']) .'/'. $kml_file;
    $kml_generated_file = "parse_test.kml";
    $kml_generated_file_url = 'http://'. $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']) .'/'. $kml_generated_file;
    $reset_cache = false;
    
    if (isset($_SESSION['file'])) {
        $kml_file = __DIR__ .'/files/'. session_id() .'.kml';
        $kml_file_url = 'http://'. $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']) .'/files/'. basename($kml_file);
        $kml_generated_file = __DIR__ .'/files/'. session_id() .'.generated.kml';
        $kml_generated_file_url = 'http://'. $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']) .'/files/'. basename($kml_generated_file);
    }
    
    if (isset($_REQUEST['op'])) {
        switch($_REQUEST['op']) {
            case 'upload_file':
                if (isset($_FILES['kml'])) {
                    $kml_file =  __DIR__ .'/files/'. session_id() .'.kml';
                    move_uploaded_file($_FILES['kml']['tmp_name'], $kml_file);
                    $kml_file_url = 'http://'. $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']) .'/files/'. basename($kml_file);
                    $_SESSION['file'] = true;
                    $reset_cache = true;
                }
                break;
            case 'input_text':
                if (isset($_REQUEST['kml_text'])) {
                    $kml_file =  __DIR__ .'/files/'. session_id() .'.kml';
                    file_put_contents($kml_file, $_REQUEST['kml_text']);
                    $kml_file_url = 'http://'. $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']) .'/files/'. basename($kml_file);
                    $_SESSION['file'] = true;
                    $reset_cache = true;
                }
                break;
            case 'clear':
                session_destroy();
                $kml_file = "parse_test.kml";
                $kml_file_url = 'http://'. $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']) .'/'. $kml_file;
                $kml_generated_file = "parse_test.kml";
                $kml_generated_file_url = 'http://'. $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']) .'/'. $kml_generated_file;
                break; 
            
        }
    }
    
    $start_time = microtime(true);
    $kml_data = file_get_contents($kml_file);
    $open_file_time = microtime(true) - $start_time;
    
    $start_time = microtime(true);
    $kml = KML::createFromText($kml_data);
    $parse_time = microtime(true) - $start_time;
    
    $start_time = microtime(true);
    $generated_kml = $kml->__toString();
    $generate_kml_time = microtime(true) - $start_time;
    
    $start_time = microtime(true);
    $generated_wkt = $kml->toWKT();
    $generate_wkt_time = microtime(true) - $start_time;
    
    $start_time = microtime(true);
    $generated_json = $kml->toJSON();
    $generate_json_time = microtime(true) - $start_time;
    
    $total_procress_time = $open_file_time + $parse_time + $generate_kml_time
                            + $generate_wkt_time + $generated_json;
                            
    $kml_object = object_to_array(simplexml_load_file($kml_file));
    $generated_kml_object = object_to_array(simplexml_load_string($generated_kml));
    $kml_diff = array_compare($kml_object, $generated_kml_object);
    
    if ($reset_cache) {
        $kml_generated_file =  __DIR__ .'/files/'. session_id() .'.generated.kml';
        file_put_contents($kml_generated_file, $generated_kml);
        $kml_generated_file_url = 'http://'. $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']) .'/files/'. basename($kml_generated_file);
    }
    
    if (isset($_REQUEST['op'])) {
        switch($_REQUEST['op']) {
            case 'kml':
                header ("Content-Type:text/xml");
                print($generated_kml);
                die();
            case 'geojson_map':
                $map = 'geojson';
                break;
            case 'kml_map':
                $map = 'kml';
                break;
            case 'original_kml_map':
                $map = 'original_kml';
                break;
        }
    }
                            
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <title>Parsing KML</title>
  <link rel="stylesheet" type="text/css" href="styles.css" />
  <link rel="stylesheet" href="http://code.leafletjs.com/leaflet-0.3.1/leaflet.css" />
  <link rel="stylesheet" href="js/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />
</head>
<body<?php if($map) print ' onload="init_'. $map .'()" class="iframe"' ?>>

  <?php if($map == 'geojson'): ?>
  
    <script src="http://code.leafletjs.com/leaflet-0.3.1/leaflet.js"></script>
    <script type="text/javascript">
      function init_geojson() {
        var jsonMap = new L.Map('geoJSONMap');
        var json = eval(<?php print($generated_json) ?>);
        
        var geojson = new L.GeoJSON(json);
        
        var osmUrl='http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
        var osm = new L.TileLayer(osmUrl);
        
        var viewPosition = new L.LatLng(42.505, -8.09);
        jsonMap.setView(viewPosition, 1);
        jsonMap.addLayer(osm);
        jsonMap.addLayer(geojson);
      }
    </script>
    
    <div class="map" id="geoJSONMap"></div>

  <?php elseif($map == 'kml'): ?>
  
    <script src="js/openlayers/OpenLayers.js"></script>
    <script type="text/javascript">
        function init_kml() {
            var kmlMap = new OpenLayers.Map({
                div: 'KMLMap',
                layers: [
                    new OpenLayers.Layer.OSM(),
                    new OpenLayers.Layer.Vector("KML", {
                        strategies: [new OpenLayers.Strategy.Fixed()],
                        protocol: new OpenLayers.Protocol.HTTP({
                            url: "<?php print $kml_generated_file_url; ?>",
                            format: new OpenLayers.Format.KML({
                                extractStyles: true, 
                                extractAttributes: true,
                                maxDepth: 10
                            })
                        })
                    })
                ],
                center: new OpenLayers.LonLat(42.505, -8.09),
                zoom: 1    
            });
        }
      </script>
      
      <div class="map" id="KMLMap"></div>
      
  <?php elseif($map == 'original_kml'): ?>
  
    <script src="js/openlayers/OpenLayers.js"></script>
    <script type="text/javascript">
        function init_original_kml() {
            var originalKmlMap = new OpenLayers.Map({
                div: 'originalKMLMap',
                layers: [
                    new OpenLayers.Layer.OSM(),
                    new OpenLayers.Layer.Vector("KML", {
                        strategies: [new OpenLayers.Strategy.Fixed()],
                        protocol: new OpenLayers.Protocol.HTTP({
                            url: "<?php print $kml_file_url; ?>",
                            format: new OpenLayers.Format.KML({
                                extractStyles: true, 
                                extractAttributes: true,
                                maxDepth: 10
                            })
                        })
                    })
                ],
                center: new OpenLayers.LonLat(42.505, -8.09),
                zoom: 1    
            });
        }
      </script>
      
      <div class="map" id="originalKMLMap"></div>
    
  <?php else: ?>

  <script src="js/jquery-1.7.2.min.js"></script>
  <script src="js/fancybox/jquery.fancybox-1.3.4.js"></script>
  <script src="js/script.js"></script>

  <h1>Parsing KML</h1>
    
    <p class="map_links">
        <a href="parse.php?op=original_kml_map" class="iframe">See input KML map</a> |
        <a href="parse.php?op=kml_map" class="iframe">See KML map</a> |
        <a href="parse.php?op=geojson_map" class="iframe">See GeoJSON map</a>
    </p>
    
    <div class="forms">
        <form action="parse.php" enctype="multipart/form-data" method="POST">
            <fieldset>
            <legend>Input KML text</legend>
            <input type="hidden" name="op" value="input_text">
            <label for="kml_text">KML text</label>
            <textarea name="kml_text"></textarea>
            <input type="submit">
            </fieldset>
        </form>
        
        <form action="parse.php" enctype="multipart/form-data" method="POST">
            <fieldset>
                <legend>Upload KML file</legend>
                <input type="hidden" name="op" value="upload_file">
                <label for="kml">KML file</label>
                <input type="file" name="kml">
                <input type="submit">
            </fieldset>    
        </form>
    </div>
    
    <table class="performance">
        <tr><td>Open file:</td><td><?php print number_format($open_file_time * 1000, 3); ?> ms</td></tr>
        <tr><td>Parse:</td><td> <?php print number_format($parse_time * 1000, 3); ?> ms</td></tr>
        <tr><td>Generate KML:</td><td> <?php print number_format($generate_kml_time * 1000, 3); ?> ms</td></tr>
        <tr><td>Generate WKT:</td><td> <?php print number_format($generate_wkt_time * 1000, 3); ?> ms</td></tr>
        <tr><td>Generate GeoJSON:</td><td> <?php print number_format($generate_json_time * 1000, 3); ?> ms</td></tr>
        <tr><td class="bold">TOTAL:</td><td class="bold"> <?php print number_format($total_procress_time * 1000, 3); ?> ms</td></tr>
    </table>
    
    
    <ul class="index">
      <li><a href="#inputKML">Input KML</a></li>
      <li><a href="#libKML">PHP libKML data</a></li>
      <li><a href="#generatedKML">Generated KML</a></li>
      <li><a href="#generatedWTK">Generated WKT</a></li>
      <li><a href="#generatedJSON">Generated GeoJSON</a></li>
    </ul>
   
    <div id="inputKML" class="block">
      <h2>Input KML</h2>
      <div class="content">
        <pre><?php print htmlspecialchars($kml_data); ?></pre>
        
        <h4>Parsed by SimpleXML</h4>
        <pre><?php print_r(new SimpleXMLElement($kml_data)); ?></pre>
      </div>
    </div>
    
    <div id="libKML" class="block block-xml">
      <h2>PHP libKML data</h2>
      <div class="content">
        <pre><?php print_r($kml); ?></pre>
      </div>
    </div>
    
    <div id="generatedKML" class="block">
      <h2>Generated KML</h2>
      <div class="content">
        <pre><?php print htmlspecialchars($generated_kml); ?></pre>
        
        <h4>Parsed by SimpleXML</h4>
        <pre><?php print_r(new SimpleXMLElement($generated_kml)); ?></pre>
        
        <?php if(count($kml_diff)): ?>
            <h4>Diff</h4>            
            <pre><?php print_r($kml_diff[0]) ?> </pre>
            
        <?php endif; ?>
      </div>
    </div>
    
    <div id="generatedWTK" class="block">
      <h2>Generated WKT</h2>
      <div class="content">
        <pre><?php print htmlspecialchars($generated_wkt); ?></pre>
      </div>
    </div>
    
    <div id="generatedWTK2d" class="block">
      <h2>Generated WKT2d</h2>
      <div class="content">
        <pre><?php print_r($kml->toWKT2d()); ?></pre>
      </div>
    </div>
    
    <div id="generatedJSON" class="block">
      <h2>Generated GeoJSON</h2>
      <div class="content">
        <pre><?php print $generated_json; ?></pre>
      </div>
    </div>
    
    <?php endif; ?>
  
</body>
</html>
