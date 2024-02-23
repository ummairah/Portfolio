import java.io.FileOutputStream;
public class FIleOutputStream {
    public static void main(String[] args) {
        try {
            FileOutputStream fout= new FileOutputStream("javaTpoint.txt");
            fout.write(78);
            fout.write(50);
            fout.close();
            System.out.println("success.....");
        }catch (Exception e) {
            System.out.println(e);
        }
    }
}
