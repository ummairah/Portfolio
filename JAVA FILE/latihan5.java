import java.io.*;
import java.util.*;
public class latihan5 {
    public static void main(String[] args) {
        try {
            FileOutputStream out = new FileOutputStream("pelajar.txt");
            Scanner sc=new Scanner(System.in);
            System.out.println("Masukkan nama anda :");
            String nama = sc.next();
            out.write(nama.getBytes());
            System.out.println("Masukan umur anda : ");
            int umur = sc.nextInt(); 
            byte age[] = Integer.toString(umur).getBytes();
            out.write(age);
            System.out.println("Masukkan nama Program anda :");
            String program = sc.next();
            out.write(program.getBytes());
            out.close();
            sc.close();
        } catch (Exception e) {
            System.out.println(e);
        }
    }
}
