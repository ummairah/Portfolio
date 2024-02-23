abstract class Parent {
     abstract void message();
}

class sc1 extends Parent {
    void message() {
        System.out.println("this is first subclass");
    }
}

class sc2 extends Parent {
    void message() {
        System.out.println("this is second subclass");
    }
}

public class question2 {
    public static void main(String[] args) {
        
        sc1 op1 = new sc1(); 
        op1.message();

        sc2 op2 = new sc2();
        op2.message();
    }
}
