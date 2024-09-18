<?php
// Base class: Vehicle
class Vehicle {
    protected $make;
    protected $model;
    protected $year;

    public function __construct($make, $model, $year) {
        $this->make = $make;
        $this->model = $model;
        $this->year = $year;
    }
    // Final method to prevent overriding
    final public function getDetails() {
        return "Make: $this->make, Model: $this->model, Year: $this->year";
    }

    // This method will be overridden by child classes
    public function describe() {
        return "This is a vehicle.";
    }
}

// Derived class: Car
class Car extends Vehicle {
    private $doors;

    public function __construct($make, $model, $year, $doors) {
        parent::__construct($make, $model, $year);
        $this->doors = $doors;
    }

    public function describe() {
        return "This is a car with $this->doors doors.";
    }
}

// Interface for electric vehicles
interface ElectricVehicle {
    public function chargeBattery();
}

// Derived class: ElectricCar extends Car and implements ElectricVehicle
class ElectricCar extends Car implements ElectricVehicle {
    private $batteryLevel;

    public function __construct($make, $model, $year, $doors, $batteryLevel = 100) {
        parent::__construct($make, $model, $year, $doors);
        $this->batteryLevel = $batteryLevel;
    }

    public function chargeBattery() {
        $this->batteryLevel = 100;
        echo "Battery fully charged.\n";
    }

    public function describe() {
        return "This is an electric car with $this->batteryLevel% battery.";
    }
}

// Final class: Motorcycle
final class Motorcycle extends Vehicle {
    public function describe() {
        return "This is a motorcycle.";
    }
}

// Test the classes
// Create a Car object
$car = new Car("Nissan", "GT-R r23", 2021, 2);
echo $car->getDetails() . "<br>";
echo $car->describe() . "<br><br>";

// Create a Motorcycle object
$motorcycle = new Motorcycle("BMW", "S 1000 XR", 2015);
echo $motorcycle->getDetails() . "<br>";
echo $motorcycle->describe() . "<br><br>";

// Create an ElectricCar object
$electricCar = new ElectricCar("Tesla", "Model 3", 2023, 4, 75);
echo $electricCar->getDetails() . "<br>";
echo $electricCar->describe() . "<br>";
$electricCar->chargeBattery();
echo $electricCar->describe() . "<br>";
?>