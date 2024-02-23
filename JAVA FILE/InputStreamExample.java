// Imported to use methods
import java.io.FileInputStream;

// Main Class
public class InputStreamExample {
	public static void main(String args[])
	{
		// Reading from Source file
		try {
			FileInputStream fileIn
				= new FileInputStream("C:\\demo\\gfg.txt");
			int i = 0;
			while ((i = fileIn.read()) != -1) {
				System.out.print((char)i);
			}
			fileIn.close();
		}
		catch (Exception e) {
			System.out.println(e);
		}
	}
}
