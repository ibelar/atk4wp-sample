#Welcome

This is a sample WordPress plugin done with the [Agile Toolkit interface (atk4-wp)](https://github.com/ibelar/atk4-wp) using the [Agile Toolkit framework (atk4)](http://www.agiletoolkit.org).

This plugin demonstratre how you can use both, the atk4-wp interface and the Agile Toolkit framework inside WordPress.

This plugin add: 

1. An admin menu call Event that display an atk4 CRUD view using an event db table.
    The table is create on plugin activation.
2. A admin sub menu Option to the Event menu.
3. Two metaboxes attached to Post type:
    One that display the last event entered;
    One that add extra fields to post entry.
4. A widget that will display the last x entry of event in a sidebar.
5. Two shortcodes:
    One that display an atk4 form with ajax form submission;
    One that display a button and count the number of time it was click.
    
#Requirement

This WordPress plugin require to have the atk4-wp interface and the Agile Toolkit framework to be install. 
[Instal atk4-wp](https://github.com/ibelar/atk4-wp);

#Installation

1. Download and copy the entire repository inside your WordPress plugin folder.
2. Go to your WordPress Plugins page and activate the atk4-wp Interface sample plugin. 

#License

Copyright (c) 2016 Alain Belair. MIT Licensed,

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.