abstract class Shape {
    double r,h;
    abstract void vol();
}
//subclass Sphere
class Sphere extends Shape {
    void vol() {
        System.out.println("The volume of Sphere is " + 
        String.format("%.2f",(4.0/3.0)*Math.PI*Math.pow(r, 3)));
    }
}
//subclass Cylinder
class Cylinder extends Shape {
    void vol() {
        System.out.println("The volume of Cylinder is " + 
        String.format("%.2f",Math.PI*Math.pow(r, 2)*h));
    }
}
// subclass Cone
class Cone extends Shape {
    void vol() {
        System.out.println("The volume of Cone is " +
        String.format("%.2f",Math.PI*Math.pow(r, 2)*(h/3)));
    }
}
public class Abst {
    public static void main(String[] args) {
        // object for sphere
        Sphere obj1 = new Sphere();
        obj1.r=10;
        obj1.vol();
        //object for cylinder
        Cylinder obj2 = new Cylinder();
        obj2.r=10;
        obj2.h=6;
        obj2.vol();  
        //object for cone    
        Cone obj3 = new Cone();
        obj3.r=10;
        obj3.h=6;
        obj3.vol();
    }
}
