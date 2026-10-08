<?php
// $cadena = "Yo soy tu padre\n";
// $ygriega = $cadena[15];
// echo $ygriega;
// echo $cadena;

// $num = 33;
// $nombre = "Larry Bird";
// printf("%s llevaba el número %d", $nombre, $num); // %d -> número decimal, %s -> string
// $frase = sprintf("%s llevaba el número %d", $nombre, $num); // no imnprime nada
// echo $frase;

// Averigua cómo mostrar, en un solo printf, las variables $num1=123.456 con solo dos cifras decimales 
// y $num2=1616.087 sin cifras decimales.
$v1=123.456;
$v2=1616.087;
printf("Variable1 con dos decimales: %.2f, variable2 sin decimales %.0f<br>", $v1, $v2);
printf("Variable1 con dos decimales: %2.2f, variable2 sin decimales %1.0f<br>", $v1, $v2);

$number = 9;
$str = "Beijing";
printf("<br>There are %u million bicycles in %s.",$number,$str);
printf("<br>There are %u million bicycles in %s.",-1,$str);

$number = 123;
printf("<br>With 2 decimals: %1\$.2f
<br>With no decimals: %1\$u <br>",$number);

printf("<br>With no decimals: %2\$u <br>",$number);

$num1 = 123456789;
$num2 = -123456789;
$char = 50; // The ASCII Character 50 is 2

// Note: The format value "%%" returns a percent sign
printf("%%b = %b <br>",$num1); // Binary number
printf("%%c = %c <br>",$char); // The ASCII Character
printf("%%d = %d <br>",$num1); // Signed decimal number
printf("%%d = %d <br>",$num2); // Signed decimal number
printf("%%e = %e <br>",$num1); // Scientific notation (lowercase)
printf("%%E = %E <br>",$num1); // Scientific notation (uppercase)
printf("%%u = %u <br>",$num1); // Unsigned decimal number (positive)
printf("%%u = %u <br>",$num2); // Unsigned decimal number (negative)
printf("%%f = %f <br>",$num1); // Floating-point number (local settings aware)
printf("%%F = %F <br>",$num1); // Floating-point number (not local settings aware)
printf("%%g = %g <br>",$num1); // Shorter of %e and %f
printf("%%G = %G <br>",$num1); // Shorter of %E and %f
printf("%%o = %o <br>",$num1); // Octal number
printf("%%s = %s <br>",$num1); // String
printf("%%x = %x <br>",$num1); // Hexadecimal number (lowercase)
printf("%%X = %X <br>",$num1); // Hexadecimal number (uppercase)
printf("%%+d = %+d <br>",$num1); // Sign specifier (positive)
printf("%%+d = %+d <br>",$num2); // Sign specifier (negative)

$str1 = "Hello";
$str2 = "Hello world!";

printf("[%s]<br>",$str1); // imprime string
printf("[%8s]<br>",$str1); // imprime string, si sobra espacio rellena con espacios en la derecha
printf("[%-8s]<br>",$str1); // imprime string, si sobra espacio rellena con espacios en la izquierda
printf("[%08s]<br>",$str1); // lo mismo que la segunda pero rellena con 0 en lugar de espacios
printf("[%'*8s]<br>",$str1); // igual que el anterior pero con asteriscos en lugar de 0
printf("[%8.8s]<br>",$str2); // 
printf("[%10.8s]<br>",$str2); // 
?>