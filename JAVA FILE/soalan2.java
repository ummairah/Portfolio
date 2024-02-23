import java.util.Scanner;
public class soalan2 {
public static void main(String[] args) {
    try {
    String nama="Khadijah";
    Scanner sc=new Scanner(System.in);

    System.out.println("Masukkan nama anda :");
    nama = sc.nextLine();

    System.out.println("Masukkan IC anda :");
    int ic = sc.nextInt();

    System.out.println("Masukkan umur anda :");
    int umur = sc.nextInt();

    System.out.println(nama);
    System.out.println(ic);
    System.out.println(umur);
    sc.close();

    }catch(Exception e){
        System.out.println(e);
    }
    }
}
