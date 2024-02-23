import java.awt.*;
import java.applet.*;

import javafx.scene.canvas.GraphicsContext;

public class Face extends Applet {
    public void paint(Graphics g){
        g.drawLine(155, 65, 100, 40);
        g.drawLine(45, 65, 100, 40);
        g.drawRect(45, 65, 110, 120);
        g.drawOval(57, 75, 30, 20);
        g.drawOval(110, 75, 30, 20);
        g.fillOval(68, 81, 10, 10);
        g.fillOval(121, 81, 10, 10);
        g.drawOval(85, 100, 30, 30);
        g.fillArc(60, 125, 80, 40, 180, 180);
        g.drawOval(15, 95, 25, 40);
        g.drawOval(160, 95, 25, 40);
    }
}
