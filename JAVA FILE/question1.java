abstract class bentuk {
    double length,width,side;
    abstract double area();
}

class Rectangle extends bentuk {
    public Rectangle (int length,int width) {
        this.length=length;
        this.width=width;
    }
    double area() {
        return length*width;
        
    }
}

class Square extends bentuk {
    public Square (double side) {
        this.side=side;
    }
    double area() {
        return Math.pow(side, 2);
    }
}

public class question1 {
    public static void main(String[] args) {
        bentuk obj1 = new Rectangle(10, 5);
        bentuk obj2 = new Square(6);

        System.out.println("Total area of Rectangle is " + obj1.area());
        System.out.println("Total area of Square is " + obj2.area());
    }
}
