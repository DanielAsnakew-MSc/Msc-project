<!--
A barcode reader (or barcode scanner) is an electronic device for reading printed barcodes. 
Like a flatbed scanner, it consists of a light source, a lens and a light sensor translating 
optical impulses into electrical ones. Additionally, nearly all barcode readers contain decoder 
circuitry analyzing the barcode's image data provided by the sensor and sending the barcode's 
content to the scanner's output port.I've ever used a good barcode scanner. And it is easily to 
recognize barcodes from image files. CODE 39: string test1 CODE 2 of 5 Interleaved: string 
Have a try!http://www.keepautomation.com/products/net_barcode_aspnet/barcodes/qrcode.html
-->
<html>
<head>
<title>Home</title>

</head>
<body>
                <h1>
                        Test1 = "CODE39"
                        <br/><button onclick="generateC39();">Generate Via JS</button>
                </h1>
                <div class="barcode39" style="width:503px;height:50px;border:1px solid red;">
                        12345ABCDE
                </div>
                <br/>
                
                <hr/>
                <h1>
                        Test2 = "1234567"
                        <br/><button onclick="generateI25();">Generate Via JS</button>
                </h1>
                <div class="barcodeI25" style="width:500px;height:50px;border:1px solid red;">
                        1234567
                </div>
                <br/>
                
                <br/>
                <i>NB: A "zero" digit is automatically added by the plugin</i>
                <hr/>           
</body>
</html>