/*
  Rui Santos
  Complete project details at Complete project details at https://RandomNerdTutorials.com/esp32-http-get-post-arduino/

  Permission is hereby granted, free of charge, to any person obtaining a copy
  of this software and associated documentation files.

  The above copyright notice and this permission notice shall be included in all
  copies or substantial portions of the Software.
*/

#include <WiFi.h>
#include <HTTPClient.h>
#include <Arduino_JSON.h>

const char* ssid = "CLARO_6d475a";
const char* password = "519b0515Dd";

const int ledPin = 23;
const int ledPin2 = 4;

//Your Domain name with URL path or IP address with path
const char* serverName = "http://192.168.1.20/appweb/productos/consultar_estado.php?id=1&tabla=estado_sistema";

// the following variables are unsigned longs because the time, measured in
// milliseconds, will quickly become a bigger number than can be stored in an int.
unsigned long lastTime = 0;
// Timer set to 10 minutes (600000)
//unsigned long timerDelay = 600000;
// Set timer to 5 seconds (5000)
unsigned long timerDelay = 5000;

String sensorReadings;
//String sensorReadingsArr[3];
String sensorReadingsArr[1];
int entero=0;
int entero2=0;

void setup() {
  Serial.begin(115200);

   pinMode(ledPin, OUTPUT);
    pinMode(ledPin2, OUTPUT);

     digitalWrite(ledPin, 1 );   // turn the LED on (HIGH is the voltage level)
       digitalWrite(ledPin2, 1 );   // turn the LED on (HIGH is the voltage level)

  WiFi.begin(ssid, password);
  Serial.println("Connecting");
  while(WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println("");
  Serial.print("Connected to WiFi network with IP Address: ");
  Serial.println(WiFi.localIP());
 
  Serial.println("Timer set to 5 seconds (timerDelay variable), it will take 5 seconds before publishing the first reading.");
}

void loop() {
  //Send an HTTP POST request every 10 minutes
  if ((millis() - lastTime) > timerDelay) {
    //Check WiFi connection status
    if(WiFi.status()== WL_CONNECTED){
              
      sensorReadings = httpGETRequest(serverName);
      Serial.println(sensorReadings);
      JSONVar myObject = JSON.parse(sensorReadings);
  
      // JSON.typeof(jsonVar) can be used to get the type of the var
      if (JSON.typeof(myObject) == "undefined") {
        Serial.println("Parsing input failed!");
        return;
      }
    
      Serial.print("JSON object = ");
      Serial.println(myObject);
    
      // myObject.keys() can be used to get an array of all the keys in the object
      JSONVar keys = myObject.keys();
    
      for (int i = 0; i < keys.length(); i++) {
        JSONVar value = myObject[keys[i]];
        Serial.print(keys[i]);
        Serial.print(" = ");
        Serial.println(value);
        sensorReadingsArr[i] = value;
      }
      Serial.print("1 = ");
      Serial.println(sensorReadingsArr[0]);

if(sensorReadingsArr[0]=="1"){
  entero=0;
   delay(10);
   entero2=1;
  }
  if(sensorReadingsArr[0]=="0"){
  entero=1;
    delay(10);
   entero2=0;
  }
       if(sensorReadingsArr[0]==""){
  entero=1;
    delay(10);
   entero2=1;
  }
       
      digitalWrite(ledPin, entero );   // turn the LED on (HIGH is the voltage level)
       digitalWrite(ledPin2, entero2 );   // turn the LED on (HIGH is the voltage level)
      //Serial.print("2 = ");
      //Serial.println(sensorReadingsArr[1]);
      //Serial.print("3 = ");
      //Serial.println(sensorReadingsArr[2]);
    }
    else {
      Serial.println("WiFi Disconnected");
    }
    lastTime = millis();
  }
}

String httpGETRequest(const char* serverName) {
  WiFiClient client;
  HTTPClient http;
    
  // Your Domain name with URL path or IP address with path
  http.begin(client, serverName);
  
  // Send HTTP POST request
  int httpResponseCode = http.GET();
  
  String payload = "{}"; 
  
  if (httpResponseCode>0) {
    Serial.print("HTTP Response code: ");
    Serial.println(httpResponseCode);
    payload = http.getString();
  }
  else {
    Serial.print("Error code: ");
         digitalWrite(ledPin, 1 );   // turn the LED on (HIGH is the voltage level)
       digitalWrite(ledPin2, 1 );   // turn the LED on (HIGH is the voltage level)
    Serial.println(httpResponseCode);
  }
  // Free resources
  http.end();

  return payload;
}
