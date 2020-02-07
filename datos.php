<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <button onclick="cargarDatos()">Click</button>
    <div ></div>
    <script>
        function cargarDatos() {
            var body = document.getElementsByTagName("div")[0];
            // Crea un elemento <table> y un elemento <tbody>
            var tabla = document.createElement("table");
            var tblHead = document.createElement("thead");
            var encabezado = document.createElement("th");
            var textoencabezado = document.createTextNode('ID');
            encabezado.appendChild(textoencabezado);
            tblHead.appendChild(encabezado);
            var encabezado2 = document.createElement("th");
            var textoencabezado2 = document.createTextNode('CONTACT_NO');
            encabezado2.appendChild(textoencabezado2);
            tblHead.appendChild(encabezado2);
            var encabezado3 = document.createElement("th");
            var textoencabezado3 = document.createTextNode('LASTNAME');
            encabezado3.appendChild(textoencabezado3);
            tblHead.appendChild(encabezado3);
            var encabezado4 = document.createElement("th");
            var textoencabezado4 = document.createTextNode('CREATED TIME');
            encabezado4.appendChild(textoencabezado4);
            tblHead.appendChild(encabezado4);
            var tblBody = document.createElement("tbody");
            //obtenemos los datos que son enviados desde el controlador a la vista
            var arrayJS = <?php echo json_encode($datos); ?>;
            for (let i = 0; i < arrayJS.length; i++) {
                var hilera = document.createElement("tr");
                var celda = document.createElement("td");
                var celda2 = document.createElement("td");
                var celda3 = document.createElement("td");
                var celda4 = document.createElement("td");
                var textoCelda = document.createTextNode(arrayJS[i].id);
                var textoCelda2 = document.createTextNode(arrayJS[i].contact_no);
                var textoCelda3 = document.createTextNode(arrayJS[i].lastname);
                var textoCelda4 = document.createTextNode(arrayJS[i].createdtime);
                celda.appendChild(textoCelda);
                celda2.appendChild(textoCelda2);
                celda3.appendChild(textoCelda3);
                celda4.appendChild(textoCelda4);
                hilera.appendChild(celda);
                hilera.appendChild(celda2);
                hilera.appendChild(celda3);
                hilera.appendChild(celda4);
                tblBody.appendChild(hilera);
            }
            tabla.appendChild(tblHead);
            tabla.appendChild(tblBody);
            // appends <table> into <body>
            body.appendChild(tabla);
            // modifica el atributo "border" de la tabla y lo fija a "2";
            tabla.setAttribute("border", "2");
            }
            
        
    </script>
</body>

</html>