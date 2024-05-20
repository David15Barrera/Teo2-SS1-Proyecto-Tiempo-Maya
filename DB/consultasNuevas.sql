use 'tiempo_maya';

INSERT INTO `categoria` (`nombre`) VALUES ('Cuenta larga');
INSERT INTO `categoria` (`nombre`) VALUES ('Numeracion Maya');

-- Insertar nuevo registro en la tabla `pagina`
INSERT INTO `pagina` (`orden`, `nombre`, `categoria`, `seccion`, `htmlCodigo`) 
VALUES (0, 'Cuenta larga', 'Cuenta larga', 'informacion', 
'<p>La Cuenta Larga es un sistema de calendario utilizado por varias culturas mesoamericanas, incluidas los mayas. Este calendario es notable por su precisión y complejidad, y se utilizó para registrar fechas históricas importantes y eventos astronómicos.<br>Los ciclos de la Cuenta Larga eran de trece baktunes, así escribían 13.0.0.0.0 como fecha inicial y final del período, en el primer caso equivale a 0baktun.0katun.0tun.0uinal.0kin que según la correlación más usada (GMT) corresponde -para el ciclo actual- al 11 de agosto del año 3114 a. C. del calendario gregoriano; el día siguiente ya se escribía como 0baktun.0katun.0tun.0uinal.1kin. La fecha final está prevista para el 21 de diciembre de 2012, a la que algunos asignaran pronósticos agoreros.</p><img src="img/SimbolosCuentaLargaMaya.png" alt="Imagen de la Cuenta Larga Maya"><br><p>Para llevar las fechas de la "Cuenta Larga" al calendario gregoriano, las datas mayas se convierten en días, a las que se le adiciona una constante de correlación para llevarlos a días julianos. El número de día juliano, es el que corresponde al transcurrido desde el mediodía del 1º de enero del año 4713 a. C.; la constante es el resultado de la diferencia de días, entre el establecido para el inicio de la cuenta de los días julianos y la fecha del inicio de la era maya actual. Una vez obtenido el juliano, se tiene su equivalencia con el calendario gregoriano.<br>\r\nEn siguiente tabla, puedes modificar los valores de los cuadros, y obtener las correlaciones. Hemos incluido dos: GMT (Goodman, Martínez, Thompson- 1927) la más usada y aceptada; y WF (Wells, Fuls -2004), que basada en nuevos cálculos arqueoastronómicos ofrece resultados que corren la relación 208 años hacia adelante, la fecha final del actual período baktun, según ella, sería el 6 de noviembre de 2220.</p> \r\n');

INSERT INTO `pagina` (`orden`, `nombre`, `categoria`, `seccion`, `htmlCodigo`) 
VALUES (1, 'PasosCuentaLarga', 'Cuenta larga', 'Informacion', 
'<p>La Cuenta Larga es un sistema de calendario utilizado por varias culturas mesoamericanas, incluidas los mayas. Este calendario es notable por su precisión y complejidad, y se utilizó para registrar fechas históricas importantes y eventos astronómicos.</p><p>A continuación se detallan los pasos y cálculos necesarios para comprender y utilizar la Cuenta Larga Maya:</p>
<ol class="steps">    <li>        <strong>Comprender las Unidades de Tiempo:</strong>La Cuenta Larga utiliza varias unidades de tiempo que se agrupan en un formato específico. Las unidades son:<ul>      <li><strong>Kin:</strong> 1 día</li><li><strong>Uinal:</strong> 20 días (1 Uinal = 20 Kin)</li><li><strong>Tun:</strong> 360 días (1 Tun = 18 Uinal)</li>
            <li><strong>Katun:</strong> 7,200 días (1 Katun = 20 Tun)</li>
            <li><strong>Baktun:</strong> 144,000 días (1 Baktun = 20 Katun)</li></ul></li><li><strong>Fecha Base:</strong>La Cuenta Larga comienza desde una fecha base que corresponde al 11 de agosto de 3114 a.C. en el calendario gregoriano. Esta fecha se escribe como 0.0.0.0.0 en la Cuenta Larga.</li>
    <li>
        <strong>Pasos para la Conversión de Fechas:</strong>
        Para convertir una fecha de la Cuenta Larga a una fecha gregoriana, se deben seguir estos pasos:
        <ol class="substeps">
            <li>
                <strong>Determinar el Número Total de Días:</strong>
                La fecha en la Cuenta Larga se expresa en términos de Baktun, Katun, Tun, Uinal, y Kin. Por ejemplo, la fecha 13.0.0.0.0 significa:
                <ul>
                    <li>13 Baktun</li>
                    <li>0 Katun</li>
                    <li>0 Tun</li>
                    <li>0 Uinal</li>
                    <li>0 Kin</li>
                </ul>
                Para calcular el número total de días, multiplica cada unidad por su equivalente en días y suma los resultados:
                <ul>
                    <li>13 Baktun * 144,000 días/Baktun = 1,872,000 días</li>
                    <li>0 Katun * 7,200 días/Katun = 0 días</li>
                    <li>0 Tun * 360 días/Tun = 0 días</li>
                    <li>0 Uinal * 20 días/Uinal = 0 días</li>
                    <li>0 Kin * 1 día/Kin = 0 días</li>
                </ul>
                <strong>Total de Días:</strong> 1,872,000 días
            </li>
            <li>
                <strong>Sumar los Días a la Fecha Base:</strong>
                La fecha base es el 11 de agosto de 3114 a.C. en el calendario gregoriano. Agrega el número total de días calculado en el paso anterior a esta fecha para obtener la fecha en el calendario gregoriano:
                <ul>
                    <li>11 de agosto de 3114 a.C. + 1,872,000 días ≈ 21 de diciembre de 2012</li>
                </ul>
            </li>
        </ol>
    </li>
    <li>
        <strong>Ejemplo Detallado de Conversión:</strong>
        Supongamos que tenemos la fecha 12.19.19.17.19 en la Cuenta Larga. Los pasos serían:
        <ol class="substeps">
            <li>
                <strong>Calcular el Número Total de Días:</strong>
                <ul>
                    <li>12 Baktun * 144,000 días/Baktun = 1,728,000 días</li>
                    <li>19 Katun * 7,200 días/Katun = 136,800 días</li>
                    <li>19 Tun * 360 días/Tun = 6,840 días</li>
                    <li>17 Uinal * 20 días/Uinal = 340 días</li>
                    <li>19 Kin * 1 día/Kin = 19 días</li>
                </ul>
                <strong>Total de Días:</strong> 1,728,000 + 136,800 + 6,840 + 340 + 19 = 1,872,000 días
		</li>            <li>               <strong>Sumar los Días a la Fecha Base:</strong>
                <ul><li>11 de agosto de 3114 a.C. + 1,872,000 días ≈ 20 de diciembre de 2012</li></ul></li></ol></li><li><strong>Uso de la Tabla:</strong>La tabla de la Cuenta Larga Maya se utiliza para registrar y calcular fechas. Cada columna de la tabla representa una de las unidades de tiempo. Al actualizar los valores, se puede calcular fácilmente la fecha correspondiente en el calendario gregoriano.</li></ol><p>La precisión y complejidad de la Cuenta Larga Maya permiten registrar fechas históricas y eventos astronómicos con gran exactitud, demostrando el avanzado conocimiento astronómico y matemático de la civilización Maya.</p>');

INSERT INTO `pagina` (`orden`, `nombre`, `categoria`, `seccion`, `htmlCodigo`) VALUES ('1', 'funcion', 'Numeracion Maya', 'Elementos', '<div class="container"><div class="info">
<p>Como ya vimos, solo existen 3 símbolos con los que podemos representar cualquier número basándonos en la posición vertical en la que se encuentre. Mientras más arriba estén, más valor adquieren.</p><p>En el momento de escribir los Números Mayas se limita el número de puntos a 4 y el número de barras a 3, así es que, si queremos representar el número 5, NO podemos poner 5 puntos, sino una barra que representa esa cantidad.</p><h2>La primera posición</h2><p>En la primera posición solamente podemos representar hasta el número 19.</p><p><strong>Primera posición para los Números Mayas:</strong> Nunca debe haber más de cuatro puntos ni 3 barras en una posición lugar.</p><h2>Segunda posición</h2><p>Al poner un valor en la segunda posición, este se eleva a la veinteava potencia, en otras palabras, se multiplica por 20. Todos los de la primera posición mantienen su valor original, pero los de la segunda ya valen 20 veces más.</p><p>Si tenemos un punto en la segunda posición, en lugar de tener un valor de 1, ahora vale 20 (1×20) y la barra en lugar de tener un valor de 5, ahora vale 100 (5×20).</p><p><strong>Segunda posición en los Números Mayas:</strong> Si quieres representar el número 20, tienes que colocar el cero en la primera posición, lo mismo si quieres representar cualquier otro número múltiplo de 20 como 40, 60, 100, 200, etc.</p><h2>Posiciones para la numeración Maya</h2><p>Así como vimos en la primera y segunda posición cómo adquieren un valor diferente dependiendo de en dónde se encuentren, podemos seguir añadiendo más posiciones para representar valores numéricos cada vez mayores.</p></div><div class="image-container"><img src="img/posiciones.jpg" alt="Posiciones para la numeración Maya"></p></div></div>');
INSERT INTO `pagina` (`orden`, `nombre`, `categoria`, `seccion`, `htmlCodigo`) VALUES ('0', 'Numeracion Maya', 'Numeracion Maya', 'Informacion', '<div class="container-info"><h2>Números Mayas</h2><p>Los Números Mayas usaron un sistema de base 20, llamado sistema “vigesimal”. Así como nuestro propio sistema numérico de base diez probablemente surgió del hecho de que tenemos 10 dedos en dos manos, probablemente el caso del sistema Maya se basó en el número de los dedos tanto de la mano, como de los pies.</p><div class="image-container"><img src="img/Numeracion.jpg" alt="Numeración Maya"></div><div class="info"><h2>Números Mayas 0, 1 y 5</h2><p>Los Mayas antiguos podían expresar cualquier número que va desde el cero, hasta el infinito por medio de solamente 3 símbolos: el caracol, un punto y una línea horizontal.</p><p>El caracol tiene el valor de 0, el punto vale 1 y la línea vale 5.</p><p>Un dato interesante es que el sistema maya puede haber sido el primero en hacer uso de cero como marcador de posición y como número en la historia conocida de la humanidad.</p></div></div>');