import java.io.*;
public class latihan4 {
    public static void main(String[] args) {
        try {
            FileInputStream data = new FileInputStream("data.txt");
            BufferedReader read = new BufferedReader(new InputStreamReader(data));
            String dataRead;
            while ((dataRead = read.readLine()) != null) {
                System.out.println(dataRead);
            }
            read.close();
        } catch (Exception e) {
            System.out.println(e);
        }
    }
}
