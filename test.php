<?php
// 取得新聞 ID
$id = $_GET['id'] ?? '';

// 假設這是你的新聞資料（也可以從資料庫讀）
$news = [
  '20250520' => '2025/5/20：重大新聞！',
  '20250519' => '2025/5/19：昨天的新聞內容...',
];

// 找不到新聞就顯示預設訊息
$text = $news[$id] ?? '找不到新聞';

// 設定回傳內容為圖片
header('Content-Type: image/png');

// 建立圖片（400x100）白底
$img = imagecreatetruecolor(400, 100);
$white = imagecolorallocate($img, 255, 255, 255);
$black = imagecolorallocate($img, 0, 0, 0);
imagefilledrectangle($img, 0, 0, 400, 100, $white);

// 加入文字（需伺服器支援文字繪圖）
imagestring($img, 5, 10, 40, $text, $black);

// 輸出圖片
imagepng($img);
imagedestroy($img);
?>
