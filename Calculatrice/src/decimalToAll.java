import java.util.Scanner;

public class decimalToAll
{
	private static Scanner kbd = new Scanner (System.in);
	
	public static void main(String[] args)
	{
		int numValue = 0;
		System.out.println("please enter an integer between 255 and 0");
		numValue = kbd.nextInt();
		
		if(numValue>255 || numValue<0)
		{
			System.out.println("Error: Integer is to hight or to low");
		}
		
		getBinary(numValue);
	}
		
	public static void getBinary(int numValue)
	{
		String s = "";
		for (int j=0; j<8; j++)
		{
			if(numValue%2 == 1)
			{
				s='1' + s;
			}
			if (numValue%2 == 0)
			{
				s = '0' + s;
			}
			numValue = numValue/2;
		}
		System.out.println("Binary equivalent is : "+s); 
	}
	
}
