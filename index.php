<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://xyz/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://xyz/css/slick.min.css" />
        <link rel="stylesheet" href="http://xyz/css/slick-theme.min.css" />

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    </head>
    <body>
        <?php
        $base_url = 'http://xyz';
        $url = 'http://xyz'; 
        $html = file_get_contents($url);
        
        $html = preg_replace('/src="images\//', 'src="' . $base_url . '/images/', $html);
        
        
        if ($html === false) {
        // Handle the error (e.g., website not accessible)
        die('Failed to fetch content from the website.');
        }
        
        // Create a DOMDocument instance and suppress errors
        $dom = new DOMDocument();
        libxml_use_internal_errors(true);
        
        // Load the HTML content into the DOMDocument
        $dom->loadHTML($html); // Assuming $html contains your HTML content
        
        // Create a DOMXPath instance to query the DOM
        $xpath = new DOMXPath($dom);
         
        $element = $xpath->query('//div[@class="xyz-section"]')->item(0);

        if ($element) {
            // Extract the inner HTML of the element
            $innerHtml = $dom->saveHTML($element);
            echo $innerHtml;
        }
            else {
            // Handle the case where the element was not found
            echo "Element not found.";
        }

        ?>

<script src="http://xyz/js/bootstrap.bundle.min.js"></script>
<script src="http://xyz/js/slick.min.js"></script>
<script src="http://xyz/js/acmeticker.min.js"></script>
<script src="http://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

<script>
        $(document).ready(function () {
            $('#example').DataTable({
            	bLengthChange: true,
                pageLength: 20,
                responsive: true
            });
        });
    </script>
    <script type="text/javascript">
	    setInterval(function(){
	    	var ct = new Date();
	        document.getElementById("curDateTime").innerHTML = ct.getDate()+' '+ct.toLocaleString('en-us', { month: 'short' })
	        +' '+ct.toLocaleString('en-us', { year: 'numeric' })+',  '+(new Date()).toLocaleTimeString('en-us',{ timeZone: "Asia/Dhaka" });
	        document.getElementById("curTime").innerHTML = 'Time:  '+(new Date()).toLocaleTimeString('en-us',{ timeZone: "Asia/Dhaka" });
	    }, 1000);
    </script>
    </body>
</html>
