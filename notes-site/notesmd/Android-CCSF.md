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

***How to access TextView from Java **

Asssuming we don't have the line `android:text` in pur xml file we can set the text in tho way:

```java
TextView tv = (TextView)findViewById(R.id.text1);
tv.setText(This is line1);
tv.setTextColor(red);
```

