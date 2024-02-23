import java.io.FileOutputStream;
public class FileOutputStreamExample {
    public static void main(String[] args) {
        try {
            FileOutputStream fout = new FileOutputStream("javaTpoint.txt");
            String s="Welcome to javaTpoint";
            byte b[] =s.getBytes();
            fout.write(b);
            fout.close();
            System.out.println("success.....");
            System.out.println();
        }catch(Exception e) {
            System.out.println(e);
        }
    }
}
