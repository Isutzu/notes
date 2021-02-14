### Android notes
When compiling and android program :
javac creates `xxx.class`
DVM(Dalvik Virtual MAchine) takes xxx.class and creates --> xxx.dex 

**Creating AVD**

```java
$ android create avd -n galx4 -t 2 \ -p mypath --skin wvaga800
```
* _if we don't specify location Android uses ./android/AVD_



__Activity__ is the name of a class in java. It produces output in the device

**Creating a project using Command Line**

```java
$ android create project -- target 2 \
--name MyApp --path ./myfirstProject \
--activity MyHello --package com.example
```

```java
$ cd myfirstProject
:myfirstProject$ ant debug compile 
$ ant debug install 
```

_ant debug keeps old debugs which we can clean it_

```java
ant clean debug
ant clean debug install
```

**Tree Directory of Android**
```
src : It has the java source code
gen : Contains R.java which is automatically generated. R stands for       resources. Never modified this file
      If we accidentally delete it we can recompile using 
      'ant clean debug'
      It has information about resources.
```

**xml files will be compiled, reducing their sze
**aapt** : Android archive and packaging tool. We can use as a      command line or in eclipse.
**aapt tasks**

1) creating R.java
2) Compiling resource files(.xml) into binary
3) Displaying whatever is in the android package. aapt can tells you what is inside the apk file
4)Arhiving and unarchiving packages(zip, apk, jar)
**We need to give the full path of the package.
aapt list -v HelloWorld.apk-->It display all the resources used

R.java
It contains reference of all our resources(main.xml file or strings or colors, dimensions)
It is located in: ~/pp/gen/package/R.java

```java
package com.cs211d

public final class R
{
     public static final class attr 
     {
     }
     public static final class layout
      {
        public static final int main  = 0X7f00698;   -->reference to main.xml where the    binary version is located in memory
      }      
     public static final class color
     {                                                         
        public static final int app_name=0Xf76598;     
     }
}
```

All methods that begin with on are called callback methods

OnCreate
: is the first override method 

setContentView(R.layout.main)
: Reference to the resource main.xml

public static final class string
: Contains all reference to our strings

*All this references could be accessed in the th R.java or in any other resource*

rsc/values/strings.xml
```xml
<?xml version=1.0 encoding="utf-8" ?>
<resources xmlns:android="http://xyz">// only if eclipse complains
     <string name="app_name"> Hello world </string>
     <string name="myname">Jhon Linn </string>
</resources>
```

rsc/values/colors.xml
```xml
<?xml version=1.0 encoding="utf-8"?>
<resources>
     <color name="red">#ff0000 </color>
     <color name="blue">#0000ff </color>
</resources>
```
**How to access to resources from java code**

```
int red         = getResources().getColor(R.color.red);
String name = getResources().getString(R.string.my_name);
```

**getResources()** Factory method that belongs to the Activity class. We don't use the name of the class because we are extending the Activity class.
Resources class doesn't have any constructor thats why we need factory method
`getString()` and `getColor()` is one of the instance methods of the resources class.
Whatever we put in the values subdirectory could be accessed in the java code through *Resources*

- Many widgets are subclassing the TextView class. 
     TextView contains many attributes.
     
- Any widget needs to be explain in xml. and any widget inside android should be represented by a special        reference call *resource id*

**In java File**
```java
<TextView
     android:id="@+id/text1"--> this is the id for textView
     android:text="@string/my_name"
     android:textColor="@color/red"
</TextView>
```

-    resource id begin with @+id follow by any name 
- plus sign(+) means text1 for this TextView is made for the first time. If later on we want to refer to text1 we can just use `@id/text1`

**There are two ways we can specify the text of TextView**
```xml
android:text="Jhon Lin" \\ we are hard coding
android:text="@string/my_name" \\ he best option. It goes to string layout file(the node string) and find my_name
```

**How to create an array in Android without using java:**

```xml
<?xml...    ?>
<resources>
   <string-array name="all_names">
      <item> good </item>
      <item> bad  </item>
      <item> nice </item>
    </string-array>
</resources>
```
**How to access to array of String**
```java
String str[] = getResources().getStringArray;

\\ R.array.all_names (R.java)
 In the R.java will appear the line:
public static final class array
{
}
```
**AndroidManifest.xml**
This is a modifiable file. Whatever is in your package is represented here

```xml
<?xmlversion="1.0"encoding="utf-8"?>
<manifest xmlns:android="http://schemas.android.com/apk/res/android"
      package="com.cs211d>
<application>
        <activity android:name=".HW2"
                  android:label"goodstuff" >
                   <intent-filter>
                              <action android:name="android.intent.action.MAIN"/>
                              <category android:name="android.intent.category.LAUNCHER"/>
                    </intent-filter>
               </activity>
</application>
</manifest>
```

- `<intent-filter> ` Specifies what the activity is doing, what the activity is all about.

- `<action>` specify the entry point to the package.
- `<category> ` specify which activity will come out first

- `<intent>` is a mechanism to connect to activities together . When one activity finishes and anothes tarts there is some data exchange: the object of Bundle class.

__Bundle__ class is in charge of data exchanging between activities
__AsyncTask__ class is in charge of running several activities simultaneously

**How to access a TextView from Java**

Asssuming we don't have the line `android:text` in pur xml file we can set the text in tho way:

```java
TextView tv = (TextView)findViewById(R.id.text1);
tv.setText(This is line1);
tv.setTextColor(red);
```
__findViewById()__ : get references from a widget
We need cast  it because is a general purpose method and it doesn't know what specific resource or to what class is being assigned

__Some attributes__
```xml
android:width="…."
android:height="…."
android:textSize="…" //font size
android:ellipsize="none" // when line is very long. it will cut the line and put an ellipses(…)
             ellipsize values: none, start,end, middle.
android:marquee="true"//if line is too long it creates a horizontal scrollbar
android:layout_width="fill_parent" //in modern version of android is called match_parent,
                                    fill_parent will be deprecated
android:layout_width="10dp"
android:layout_height
```

- Whenever we are using strings, whatever is in the xml file will com out first, but this could be change later.

- Inside xml class, the tags we are using are subclassing View class.
Inside the xml file we can put our own class but it needs to be fully qualified, we need to explicit the name of the package.

```
<TextView….>
     <com.cs211s.ExplodeIt…>
```

The condition is the class we insert in xml file  needs to subclass View and it needs to be fully qualified.
all of the attributes are part of View class, therefore we can use attributes because we are subclassing View.

- It is also possible to make our own attributes

__Unit measures__

In android we can use pixels(px),inches(4in), milimmiters(4mm),point(7pt),density independent pixel(6dp).
dp, sp(12sp).
dp : is independent of the resolution cellphone is using. It depends on how dense the pixels of the device is.
sp : It is use for fonts.

__Button class__

Button is subclassing TextView, whatever is available for TextView is available also for button.
When working with buttons we need to create a method in java file, which is responsible for putting action to the button.

```java
public voir doit(View v)
{
     --
     --
}

// In the layout file we need to have an attribute:
<Button
     android:onClick="doit"
     ...
     ...
```
- If we have more than one button, for each button we need different button tags.
- We can respond to the action of different buttons using only one method. Traditionally the name of the method
is called buttonHandler:
         ` public void buttonHandler(View v)`

- View class has int v.getId() method which returns the id of the button

```java
public   void buttonHandler(View v)
{
   switch(v.getId())
   {
      case R.id.b1: loadfile(); break;

      case R.id.b2: readfile(); break;
   }
}
```
For graphics we need use graphics package: `android.graphics.*;`
We have two important classes:
Canvas class and Paint class:
   - Canvas defines what to be drawn(object, geometrical shape)  . It contains drawCircle, etc
   - Canvas is a borderless graphic area.

   - Paint defines how that shape will be drawn. We can define the type of fonts in graphics, dotted lines, etc
   We need create object of Canvas and Paint.

Normally we need to make our own class when working with graphics and then we make our activity call the class we have created.

__How to draw a Line__

```java
package good.stuff;
import android.graphics.*;
import android.view.View;
import android.content.Context;
//This  is an external or individual class
//However many people create inside the activity class
public class DrawView extends View
{
 // Paint p = new Paint(); creates a NOT smooth shape
     Paint p = new Paint(Paint.ANTI_ALIAS_FLAG); //creates a smooth shape
     public DrawView(Context con)
     {
         super(con);
         p.setColor(Color.BLACK);
     }
 //We need override callback method onDraw
     @override
     public void onDraw(Canvas c)
     {
         c.drawLine(0,0,20,20,p); --> //c.drawLine(x1,y1,x2,y2,object of paint)
         c.drawLine(20,20,0,0,p);
     }

}
```

```java
package good.stuff;
import android.app.Activity;
import android.graphics.Color;
import android.OS.Bundle;

public class DemoDrawLine extends Activity
{
   DrawView dv;
   @Override
   public void onCreate(Bundle b)
   {
      //Activity is subclassing Context
      super.onCreate(b);
      dv = new DrawView(this);/--> this is Context
      dv.setBackgroundColor(Color.WHITE);
      setContentView(dv);
      //object of view or any class subclassing View
      //whenever contentview is called the screen will be refreshed
      //we can create a tag in xml file but dont forget the full qualified package
      //and then setContentView(R.layout.main)
   }
}
```
__Drawing a line using XML__
```xml
<VIew
     android:layout_width="fill_parent"
     android:layout_height="1dp"
     android:background="#cccccc"
     android:paddingTop="20dp"
/>
```
__How to draw a Circle__

```java
package good.stuff;
import android.graphics.*;
import android.view.View;
import android.content.Context;

public class DrawCircle extends View
{
     public DrawCircle(Context con)
     {
         super(con);

     }
     @override
     purotect void onDraw(Canvas c)
     {
         super.onDraw(c);
         paint p = new paint();
         p.setColor(Color.RED);
         p.setStyle(paint.Style.FILL);
         c.drawCircle(75,75,100,p);//x,y,radius,p
     }

}
//--------------------------------------------
package good.stuff;
import android.app.Activity;
import android.graphics.Color;
import android.OS.Bundle;

public class DemoDrawCircle extends Activity
{

   @Override
   public void onCreate(Bundle b)
   {
      super.onCreate(b);
      setContentView(new DrawCircle(this));
   }
}
```
__How to create a color__

`int c = Color.rgb(int r, int g, int b);`

__How to know the amount of a color__

```java
int red = Color.red(int color)
int blue =  Color.blue(..)
int green = Color.green(…)
```
__How to create empty Circle__

`p.setStyle(paint.Style.STROKE);`

__How to get the Screen Size__

```java
It returns an array of width and height in pixels

public int[] getScreenSize()
{
     int dim[]={0,0};
     paint p =new paint();
     WindowManager wm = getWindowManager();
     if(Build.VERSION.SDK_INT >= Buils.VERSION_CODES.HONEYCOMB_MR2)
     {
          wm.getDefaultDisplay().getSize(p);
          dim[0] = p.x; dim[1] = p.y;
     }
     else
     {
          Display d = wm.defaultDisplay();
          dim[0]=d.getWidth();
          dim[1] = d.getHeight();
     }
     return(dim);
}

//In our code
int w = getScreenSize[0];
int h = getScreenSize[1];
```

__How to print text in Canvas__

```java
c.drawText("Hello Jhon",75,85,p);//c is objet of Canvas
p.setAntiAlias(true);
p.setSize(30);//maximun size for our string in px
c.drawColor(Color.TRANSPARENT)// clear the screen. Color.Black
                                                     //In some version it doesn't work
```                                                     

__Another alternative for clearing screen__
`c.drawColor(Color.TRANSPARENT, PorterDuff.ModeCLEAR);`

__How to draw a Triangle__

```java
p.setStyle(paint.Style.STROKE);// empty triangle
p.setStrokeWidth(g);// width of line
p.setColor(Color.RED);
Path pt = new Path();
pt.moveTo(x[0],y[0]);
pt.lineTo(x[1],y[1]);
pt.lineTo(x[2],y[2]);
pt.lineTo(x[0],y[0]);
pt.offset(10,40);//offset of initial location(10,40) to go another place in screen
pt.drawPath(pt,p);
pt.offset(50,100);
pt.drawPath(pt,p);

// We can use any methods of Canvas and Paint class
```

In Android we have `invalidate()` similar to `repaint()` in Java. It is a View method
invalidate() will call view(). we can call it inside the class drawing the circle or we can call it also in our activity.
But if it s taking more that 5 seconds we need use thread. invalidate is used only in activity or inside class that extends view.

```java
If we have a thread we call postInvalidate()

 public MyView(context con)
{
     super(con)
}
 //This constructor is made if we are calling our view class from //our activity, not from our xml 
setContentView(new MyView(this))

public myView(context con, AttributeSet attrs)
{
     super(con,attrs);
}
When creating our xml tag it normally has one or more attributes

public MyView(Context con,AttributesSet attrs, int style)
{
     super(con,attrs,atyle);
}
```
- Each widget comes with a bunch of styles we can use . those styles can be passed to our View.
If we want to do this we need this constructor

- We can use `android:weight` to put buttons side by side in the way we want