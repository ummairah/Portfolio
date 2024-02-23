// Imported to use inbuilt methods
import java.io.FileOutputStream;

// Main class
public class OutputStreamExample {
	public static void main(String args[])
	{
		// Writing in file gfg.txt
		try {
			FileOutputStream fileOut
				= new FileOutputStream("C:\\demo\\gfg.txt");
			String s = "Lets learn JAVA";

			// converting string into byte array
			byte b[] = s.getBytes();
			fileOut.write(b);
			fileOut.close();
			System.out.println(
				"file is successfully updated!!");
		}
		catch (Exception e) {
			System.out.println(e);
		}
	}
}
