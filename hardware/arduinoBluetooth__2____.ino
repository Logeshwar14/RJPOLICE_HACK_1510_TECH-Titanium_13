#define ledPin 2
#include "DHT.h"

#define DHTPIN 12    
#define DHTTYPE DHT11   // DHT 11
DHT dht(DHTPIN, DHTTYPE);


int data = 0;
void setup() {
  pinMode(ledPin, OUTPUT);
  digitalWrite(ledPin, LOW);
  Serial.begin(9600); //default baud rate for bt 38400
  Serial.begin(9600);
  Serial.println(F("DHTxx test!"));

  dht.begin();

}
void loop() {
  if(Serial.available() > 0){ // Checks whether data is comming from the serial port
    data = Serial.read(); // Reads the data from the serial port
    
          if (data == '0') {
            digitalWrite(ledPin, LOW); // Turn LED OFF
            Serial.println("LED: OFF"); 
            }
              else if (data == '1') {
                digitalWrite(ledPin, HIGH);
                Serial.println("LED: ON");
               
              } 
  }

Serial.begin(9600);
  Serial.println(F("DHTxx test!"));

  dht.begin();
}

void loop() {
  // Wait a few seconds between measurements.
  delay(2000);

  
  float h = dht.readHumidity();
  // Read temperature as Celsius (the default)
  float t = dht.readTemperature();
  // Read temperature as Fahrenheit (isFahrenheit = true)
  float f = dht.readTemperature(true);

  // Check if any reads failed and exit early (to try again).
  if (isnan(h) || isnan(t) || isnan(f)) {
    Serial.println(F("Failed to read from DHT sensor!"));
    return;
  }

  // Compute heat index in Fahrenheit (the default)
  float hif = dht.computeHeatIndex(f, h);
  // Compute heat index in Celsius (isFahreheit = false)
  float hic = dht.computeHeatIndex(t, h, false);

  Serial.print(F("Humidity: "));
  Serial.print(h);
  Serial.print(F("%  Temperature: "));
  Serial.print(t);
  Serial.print(F("°C "));
  Serial.print(f);
  Serial.print(F("°F  Heat index: "));
  Serial.print(hic);
  Serial.print(F("°C "));
  Serial.print(hif);
  Serial.println(F("°F"));
}
