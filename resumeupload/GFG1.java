import java.awt.*;
import javax.swing.*;
import java.awt.geom.Line2D;
  
class MyCanvas extends JComponent {
  
    public void paint(Graphics g)
    {
  
        // draw and display the line
        //g.drawLine(30, 20, 80, 90);
        //g.drawOval(100, 100, 150, 100);
        //g.drawRect(200,200,500,500);
        //g.drawOval(150,150,100,100);
        
        //to draw a kite
        /*
        g.drawLine(300,100,200,200);
        g.drawLine(300,100,400,200);
        g.drawLine(200,200,400,200);
        g.drawLine(200,200,300,300);
        g.drawLine(300,300,400,200);
        g.drawLine(300,300,250,350);
        g.drawLine(250,350,350,350);
        g.drawLine(300,300,350,350);
        g.drawLine(300,100,300,300);
        */
        
        //to draw a house
        g.drawLine(300,100,200,200);
        g.drawLine(300,100,400,200);
        g.drawLine(200,200,400,200);
        g.drawLine(300,100,700,100);
        g.drawLine(700,100,800,200);
        //g.drawLine();
    }
}
  
 class GFG1 {
    public static void main(String[] a)
    {
  
        // creating object of JFrame(Window popup)
        JFrame window = new JFrame();
  
        // setting closing operation
        window.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
  
        // setting size of the pop window
        window.setBounds(30, 30, 200, 200);
  
        // setting canvas for draw
        window.getContentPane().add(new MyCanvas());
  
        // set visibility
        window.setVisible(true);
    }
}


