package polimorphism;

class polyOverload {
    public int add(int x,int y) { //method 1
        return x+y;
    }

    public int add(int x, int y, int z ) { ///method 2{
        return x+y+z;
    }

    public int add(double x, int y) { //method 3
        return (int)x+y;
    } 

    public int add(int x,double y) { 
        return x+(int)y;
    }  
}

public class Test {
    public static void main(String[] args) {
        polyOverload demo=new polyOverload();
        System.out.println(demo.add(2,3));
        System.out.println(demo.add(2, 3, 4));
        System.out.println(demo.add(2, 3.4));
        System.out.println(demo.add(2.5, 3));
    }
}
