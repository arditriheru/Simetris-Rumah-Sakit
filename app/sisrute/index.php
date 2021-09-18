<?php
 // Id & Password yang diberikan kemkes
$id = 3471379;
$pass = md5("rujukan2016");

   //Get Timestamp
$dt = new DateTime(null, new DateTimeZone("UTC"));
$timestamp = $dt->getTimestamp();

   // Generate Signature
$key = $id."&".$timestamp;					
$signature = base64_encode(hash_hmac("sha256", utf8_encode($key), utf8_encode($pass), true));

   // Contoh untuk mengakses referensi faskes
$url = "http://api.dvlp.sisrute.kemkes.go.id/referensi/faskes?query=wahidin";
   $method = "GET"; // POST / PUT / DELETE
   $postdata = "";
   $headers = [
   	"X-cons-id: ".$id,
   	"X-Timestamp: ".$timestamp,
   	"X-signature: ".$signature,
   	"Content-type: application/json",
   	"Content-length: ".strlen($postdata)      
   ];

   // Gunakan curl untuk mengakses/merequest alamat api
   $curl = curl_init();			
   curl_setopt($curl, CURLOPT_URL, $url);
   curl_setopt($curl, CURLOPT_HEADER, false);
   curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
   curl_setopt($curl, CURLOPT_POSTFIELDS, $postdata);

   curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
   curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
   curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

   $result = curl_exec($curl);
   curl_close($curl);

   echo $result;
   ?>