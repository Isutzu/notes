**Kotlin Anonymous functions**

- Do not use return keyword.
- Can be assigned to a variable and passed to another functions

```kotlin
var myFunction :(String) ->String = {
     name ->
    "My name is $name"
}

println(myFunction("oscar"))

//OUTPUT: My name is Oscar
```

When the anonymous function has only one argument we can omit the argument declaration

```kotlin
var myFunction :(String) ->String = {
    "My name is $it"
}
println(myFunction("oscar"))
```

