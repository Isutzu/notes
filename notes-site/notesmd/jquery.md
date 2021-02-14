```html
<div id="example">
   <p> This is the first paragraph </p>
   <p class='z'>  This is the first paragraph </p>
   <p>  This is the first paragraph </p>
   <p>  This is the first paragraph 3 </p>
</div>
```
`$("#example p:even" ).css('border', '1px solid red')`

`$("#example p:eq(3)" ).css('border', '1px solid red')`

`$("#example p:not(eq(3))").css('border', '1px solid red')`

**Filters**
 
```javascript

$("#example p:first").css("border", "3px solid red");
$("#example p:last").css("border", "3px solid red");
$("#example p:even").css("border", "3px solid red");
$("#example p:odd").css("border", "3px solid red");
$("#example .a:first").css("border", "3px solid red");
$("#example .b:even").css("border", "3px solid red");
$("#example p:gt(1)").css("border","3px solid red");
$("#example p:not(p:eq(2))").css("border", "3px solid red);

$("p[class]").css("border", "3px solid red");
$("p[id=para1]").css("border", "3px solid red");
$("p[id^=para]").css("border", "3px solid red");
$("p[id^=para][lang*=en-]").css("border", "3px solid red");
```     
**Hearachy Selectors**
   - `$("parent > child")`: selects "child" elements that are immediate descendants of the "parent"
   - `$("ancestor descendant")`: selects "descendant" elements as long as they have an "ancestor" element
                somewhere above them
   - `$("prev + next")`: selects the "next" element if it is immediately preceded by a "prev" element
   - `$("prev ~ siblings")`: selects all "siblings" elements that come after a "prev" element


**Traversing the DOM**
```html
<body>
    <h1>Using jQuery Document Traversal Features</h1>
    <div id="content">

        <p>The DOM of a Web page is organized as a tree structure. The elements in the page have family-like names to refer
            to their positions relative to other elements.</p>
        <p>For example, the HEAD and BODY tags are "children" of the HTML tag, and are "siblings" of each other. They have the
            HTML tag as their "parent". jQuery provides functions for navigating the document tree and processing sets of
            elements, such as:</p>
        <ul id="list1">
            <li><code>children()</code>: Retrieves all the child elements of the matched elements, except text nodes</li>
            <li><code>prev(), next(), parent()</code>: used to traverse the family relationships of an element</li>
            <li><code>find()</code>: search within a given element to find elements that match a selector expression</li>
            <li><code>each()</code>: loops over a set of matched elements and calls a function for each one</li>
        </ul>
        <div id="example">
            <p class="a">This is paragraph 1</p>
            <p id="para1">This is paragraph 2</p>
            <p class="b">This is paragraph 3</p>
            <p id="para4" lang="en-us">This is paragraph 4</p>
            <p id="para5" lang="en-gb">This is paragraph 5</p>
        </div>
    </div>
</body>
```

`children()`: Retrieves all the child elements of the matched elements, except text nodes
`prev()`, next(), parent(): used to traverse the family relationships of an element
`find()`: search within a given element to find elements that match a selector expression
`each()`: loops over a set of matched elements and calls a function for each one

