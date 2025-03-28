import java.util.Scanner;

public class hexadecimalToAll {
	
	public static void main(String[] args)
	{
		Scanner sc=new Scanner(System.in);
		
		String hexadecimal;
		System.out.println("Enter a hexadecimal number: ");
		hexadecimal=sc.nextLine();
		
		int decimal;
		String octal,binary;
		
		decimal=Integer.parseInt(hexadecimal, 16);
		binary=Integer.toBinaryString(decimal);
		octal=Integer.toOctalString(decimal);
		
		System.out.println("dmal: "+decimal+" Binary: "+binary+" Octal" );
	}

}
