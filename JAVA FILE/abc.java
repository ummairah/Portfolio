// Java program to demonstrate the working
// of the FileInputStream close() method

import java.io.File;
import java.io.FileInputStream;

public class abc {

	public static void main(String[] args)
	{

		// Creating file object and specifying path
		File file = new File("file.txt");

		try {
			FileInputStream input
				= new FileInputStream(file);
			int character;
			// read character by character by default
			// read() function return int between
			// 0 and 255.

			while ((character = input.read()) != -1) {
				System.out.print((char)character);
			}

			input.close();
			System.out.println("File is Closed");
			System.out.println(
				"Now we will again try to read");
			while ((character = input.read()) != -1) {
				System.out.print((char)character);
			}
		}
		catch (Exception e) {
			System.out.println(
				"File is closed. Cannot be read");
			e.printStackTrace();
		}
	}
}
