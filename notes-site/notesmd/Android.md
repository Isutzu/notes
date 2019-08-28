 <!-- TODO
  generate getters and setters in Android Studio. Big Nerd Ranch. pg.85
   -->
![](https://github.com/Isutzu/notes/blob/master/images/android-logo.png?raw=true)

## Android certification notes

**Keep in mind**

1. Build apps with *multiscreen support.*

2. *Performance* (code optimization).

3. *Security* &nbsp; (ex. ProGuard is a tool provided by Android   Studio that removed unused classes, functions, etc. and encrypts your app code and resources while packaging the app).

4. *Compatibility* with older versions(use Android support library which allows you to use the features of recent platform API's on older devices).

5. *Market and user understanding.*

<br>

## AndroidManifest.xml

Contains the declarations of all your app components(activities, services, content providers, notification).

Before the Android system start a component it checks in the manifest file what components you are using. They must be specified in the manifest file so your app can start them.


**default attributes**


```
1. android:allowBackup="true"

2. android:icon="@mipmap/ic_luncher"

3. android:label="@string/app_name"

4. android:theme="@style/AppTheme"

```



1. It makes a backup of the app user settings . For example when the user switch to a new phone it will keep the configuration. By default is set to true on Api level 23 (Android 6.0) and higher.

2. the app icon that shows in the launcher.

3. the app name.

4. the appearance of the user interface. text, etc.

<br>

## Declaring Android version

This values will be overwritten if they are specified in the *gradle* file.

```
<uses-sdk
    android:minSdkVersion="14"
    android:targetSdkVersion="19"/>

```

<br>


## The development process

It starts with drawings mock ups of the user interface.

- it is always useful to create a unique package name since the beginning to avoid extra work later


## The built process

Android package all dependencies, libraries and create the *.apk* (equivalent to .exe file) using *Gradle*. This is called the Gradle built system. Gradle also keeps track of the version and testing.

- The build.gradle file **(Module:app)** is located in our app folder
    and contains settings for our specific module .

- The build.gradle file **(Project:NameOfYourApp)** is located in our Project
folder and contains settings that apply to all modules.

<br>

## Layouts and Views

*ConstraintLayout* was designed to make it easy to drag and drop views in the layout editor. A *constraint* is just a connection or alignment to another view, to the parent layout, or to an invisible guideline.
We can create complex layouts withouts having to nest different views.

To use ConstraintLayout, the appropriate support library must be included in the *build.gradle* (Module: app) file in your project. The constraint-layout dependency is provided as a separate support library that works on all Android versions back to Android 2.3 (Gingerbread).

```
dependencies {
  ...
  compile 'com.android.support.constraint:constraint-layout:x.x.x'
}
```

*Resources*

- [Constraint Layout CodeLab](https://codelabs.developers.google.com/codelabs/constraint-layout)

*RelativeLayout* Its views are positioned in relation to another views or the parent view. Ex. (toLeftOf, )
<br>




## Context

It contains information about the application environment. For example, when we make a Toast we need the context of the app because the toast will appear on the visible UI .
We can use *this* as the context if we are already in the context of the activity.
<br>

*Resources*

- [Android build system](https://developer.android.com/studio/build/index.html)
- [Android Pixel densities](http://iconhandbook.co.uk/reference/chart/android/)

- Multiscreen support
    + [Multiscreen Support](https://developer.android.com/training/basics/supporting-devices/screens.html)

    + [Android Multiscreen support](https://developer.android.com/training/multiscreen/screendensities.html)

    + [Handling bitmaps - Glide Library](https://developer.android.com/topic/performance/graphics/index.html)


- [Modules and  file structure](https://developer.android.com/studio/projects/index.html#mipmap)

- [this and MainActivity.this](https://www.quora.com/In-Android-coding-what-does-MainActivity-this-do-and-what-are-MainActivity-and-this-separately-class-keyword-etc)

- [Class class](https://stackoverflow.com/questions/4453349/what-is-the-class-object-java-lang-class)
<br>

## Activity navigation

Android provides two ways of navigating between activities:
*back navigation* and *up navigation.*

*** Back navigation *** occurs when pressing the back button :arrow_left: on the Android phone. Every time an activity is started it is pushed into the *back stack* and gets focus so the user can interact with the activity. The back stack contains all the activities launched by the user within the app.When the user hits the back button again the current activity is destroyed from back stack and the previous one is resumed. The back stack can be configured to work in a different way.

*** Up navigation ***  occurs when the developer place an arrow key (usually in the action bar also called tool bar) so the user can navigate back to the previous activity. Additionally by declaring a Parent Activity
in the AndroidManifest.xml file the system can place an arrow so the use can navigate back to the previous activity. Use the attribute `android:parentActivityName` for API 16 and above and use the `<meta-data>`
 tag for backwards Compatibility.

```java
<activity
    android:parentActivityName=".MainActivity"
    android:label="Second Activity"
    android:name=".SecondActivity">

    <meta-data
     android:name="android.support.PARENT_ACTIVITY"
     android:value="com.example.android.twoactivities.MainActivity"/>

</activity>

```

*Resources*

- [Tasks and back stack](https://developer.android.com/guide/components/activities/tasks-and-back-stack.html)

<br>

## Intent

An intent is a class that extends the *Object* class . An intent is a package of instructions. One of the most common uses of intents is to tell the framework to navigate to a different activity It is used to:

- Start an activity.
- Start a Service.
- Start a Broadcast Receiver.

It can also deliver data throught the `putExtra()` methods or the `setData()`. This last method accept an Uri. If we wnat to send more than one Uri we can use the `putExtra()`

`setData()` is used to send an Uri . We can send only one Uri. To send multiple Uri to an activity we will need to create multiple intent objects or use the *putExtra()* method which is the easier way.


`putExtra()` can send primitive data types and also Objects. To send and object it has to implement the Parceable or Serialize interface first. This method can be used also to send more than one *Uri*.

** How to start an Activity **

If the activity we want to start is in the same project we can use:
` startActivity(new Intent(this,SecondActivity.class))`

We can start any other activity from a different app if we know the fully qualified name. This name should be declared in the <intent-filter> of the app we want to call

```java
    <activity
        android:label="Second Activity"
        android:name=".SecondActivity">
        <intent-filter >
            <action android:name="net.learn2develop.SecondActivity" />
            <category android:name="android.intent.category.DEFAULT" />
        </intent-filter>
    </activity>

```

`startActivity(new Intent("com.example.anotherApp.ActivityName"))`

**LifeCycle of an Activity**

`onSaveInstantState(Bundle outstate)`  this callback method is called between *onPause()* and *onStop()* before the activity might be destroyed.
We can restore the activity instant state either in the *onCreate()* or *onRestoreInstantState()* callback methods. *onRestoreInstant()* is called after *onStart()* but it is better restore the activity in the *onCreate()* method.
Before restoring check if the Bundle object is not null. The first time we run the app the the bundle object in the  *onCreate()* method will be null.

`onCreate()` is called only once when the activity is first created. we do the following Tasks.

- Initialize variables.
- Set up the user interface.
- Set up backgroud tasks.

`onStart()`

**Implicit Intents**

Any activity in your app can be called from the your app or another app with implicit intents

**Testing and Debugging**

JUnit is a testing framework for Java

<br>

*Android Support Libraries**
    Android support libraries must match the compileSdkVersion

<br>

**shortcut keys**
<div style="background-color:#bef4df">

-  ``cmd + B `` press this key combination after placing he cursor in a resource
declaration(string,color,etc) and it will take you to the folder where the  
resource was declared.

- `` option + enter`` create a string resource from a hard coded string.

- ``ctrl + space`` place cursor on the method and click this keys to show the parameters and documentation.
</div>

**Notes**

`Jack Compilor` allows you to use Java 8 syntax like lambda expressions

`Adding dependencies on Android Studio`   File->Project Structure->app->Dependencie tab 

`option + return` extract hard coded string and create a recource string

`cmd + click` jump to the file that is pointed byt the cursor.

<br>

** java resources **

- [Abstract class](https://www.javatpoint.com/abstract-class-in-java)

- [seekbar example](http://abhiandroid.com/ui/seekbar)

 