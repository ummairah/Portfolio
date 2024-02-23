package polimorphism;

class Vehicle {

    public void move() {
        System.out.println("Vehicle can move!!");
    }
}

class MotorBike extends Vehicle {
    public void move() {
        System.out.println("MotorBike can move and accelerate too!!");
    }
}

public class testing {
    public static void main(String[] args) {
        Vehicle vh = new MotorBike();
        vh.move(); // prints MotorBike can move and accelerate too!!
        vh = new Vehicle();
        vh.move(); //prints Vehicle can move!!
    }
}
