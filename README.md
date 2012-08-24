# Embedded Magento Extension Documentation

Documentation is time consuming and difficult to manage.  I hate having to update PDFs and circulate them to customers.  Using a wiki is a great idea, but
the instructions might not map directly to a customer's installed version.  How about we ship documentation with our extensions?

Place your documentation in a `docs/` folder inside your extension root, add a couple of directives to your `config.xml` and you're done!

### Installation

If you're a modman user, you can do the following in a Magento directory:

    mkdir .modman/ && cd .modman
    git clone https://github.com/punkstar/magento_bundleddocs.git bundleddocs
    cd ../
    modman deploy bundleddocs

Otherwise, just copy the files over your existing Magento installation.

### Accessing Documentation

The extension adds a menu option under **System** in the Magento administrationa area called **Extension Documentation**.

It'll look something like this:

![image](http://up.nicksays.co.uk/image/2L0336030P1e/Screen%20Shot%202012-08-24%20at%2015.14.24.png)

### Writing Documentation

Your documentation lives inside `YourNamespace/YourModule/docs/`.  Documentation files are plain HTML.

Once you've written your documentation you can get it to appear in the documentation view menu by adding the following to your `config.xml`:

	<config>
		...
	    <docs>
	        <Meanbee_BundledDocs>
	            <title><![CDATA[Meanbee: Bundled Docs Provider]]></title>
	            <pages>
	                <own_documentation>
	                    <title>Adding Your Own Documentation</title>
	                    <file>AddingYourOwnDocumentation.html</file>
	                </own_documentation>
	                <example_styling>
	                    <title>Example Markup Styling</title>
	                    <file>ExampleDocumentationMarkup.html</file>
	                </example_styling>
	            </pages>	            	            
	        </Meanbee_BundledDocs>
	    </docs>	
	</config>

* The `Meanbee_BundledDocs` section should match your extension folder structure as it's used to locate your `docs/` folder.
* All children of the `<pages />` tag should be unique.
* The `<file />` tag is the filename of the documentation item in your `docs/` folder.

If all goes well, you should see something like:

![image](http://up.nicksays.co.uk/image/363r2s1h2b2H/Screen%20Shot%202012-08-24%20at%2015.11.44.png)

### Documentation Style Guide

All documentation should open with a `<h1>` and all body text should be within `<p>` tags.  You can check out the `ExampleDocumentationMarkup.html` in the, wait for it, extension documentation section.

### License

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.