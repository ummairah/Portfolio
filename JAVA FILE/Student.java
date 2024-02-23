public class Student {
    String name_std;
    int std_age;
    void getdata(String name, int age) {
        name_std=name;
        std_age=age;
    }
    void displaydata() {
        System.out.println("Name : "+ name_std);
        System.out.println("Age :"+ std_age);
    }
    public static void main(String[]args) {
        Student pelajar1 = new Student();
        pelajar1.getdata("Marissa", 17);
        pelajar1.displaydata();
    }
    }
