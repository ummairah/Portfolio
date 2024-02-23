import java.io.BufferedWriter;
import java.io.File;
import java.io.FileWriter;

public class CloseFile {
    public static void main(String[] args) throws Exception {
        File file = new File("C:\\demo\\demofile.txt");
        if (file.exists()) {
            BufferedWriter bufferWriter = new BufferedWriter(new FileWriter(file, true));
            bufferWriter.write("\n" + "pada hari ini saya kan membentangkan tentang...");
            bufferWriter.newLine();
            bufferWriter.close();
        }
    }
}
