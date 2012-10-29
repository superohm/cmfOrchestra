Prototype to easily share entities accross Bundle and Application
=================================================================

SonataEasyExtendsBundle is a prototype for generating a valid bundle structure from
a Vendor Bundle. The tool is started with the simple command line: ``sonata:easy-extends:generate``.

The command will generate:

  - all required directories for one bundle (controller, config, doctrine, views, ...)
  - the mapping and entity files from those defined in the CPB. The SuperClass must be prefixed by BaseXXXXXX.
  - the table name from the bundle name + entity name. (blog__post, where blog is the BlogBundle and Post the entity name)


Installation
------------

  - Add SonataEasyExtendsBundle to your src/Bundle dir

        git submodule add git://github.com/sonata-project/SonataEasyExtendsBundle.git vendor/bundles/Sonata/EasyExtendsBundle

  - Add SonataEasyExtendsBundle to your application kernel

        // app/AppKernel.php
        public function registerBundles()
        {
            return array(
                // ...
                new Sonata\EasyExtendsBundle\SonataEasyExtendsBundle(),
                // ...
            );
        }