import java.io.*;
public void main
{
public static void main(String args[])throws IOException
{
int s1,s2,s3,flag=0,i,j;
DataInputStream s= new DataInputStream(System.in);
System.out.println("Enter the lower limit:");
s1=Integer.parseInt(s.readLine());
System.out.println("Enter the lower limit:");
s2=Integer.parseInt(s.readLine());
System.out.println("The Prime Numbers in Between The Entered Limits Are:");
for(i=s1;i<=s2;i++)
{
for(j=2;j<i;j++)
{
if(i%j==0)
{
flag=0;
break;
}
else
{
flag=1;
}
}
if(flag==1)
{
System.out.println(i);
}