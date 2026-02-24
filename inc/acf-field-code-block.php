<?php
/**
 * Defines the custom field type class.
 */

if (! defined('ABSPATH')) {
	exit;
}

/**
 * outcomes_first_group_acf_field_code_block class.
 */
class outcomes_first_group_acf_field_code_block extends \acf_field {
	/**
	 * Controls field type visibilty in REST requests.
	 *
	 * @var bool
	 */
	public $show_in_rest = true;

	/**
	 * Environment values relating to the theme or plugin.
	 *
	 * @var array $env Plugin or theme context such as 'url' and 'version'.
	 */
	private $env;

	/**
	 * Constructor.
	 */
	public function __construct() {
		/**
		 * Field type reference used in PHP and JS code.
		 *
		 * No spaces. Underscores allowed.
		 */
		$this->name = 'code_block';

		/**
		 * Field type label.
		 *
		 * For public-facing UI. May contain spaces.
		 */
		$this->label = __('Code Block', 'your-theme-name');

		/**
		 * The category the field appears within in the field type picker.
		 */
		$this->category = 'choice'; // basic | content | choice | relational | jquery | layout | CUSTOM GROUP NAME

		/**
		 * Field type Description.
		 *
		 * For field descriptions. May contain spaces.
		 */
		$this->description = __('A code block formatted using Prism.js', 'your-theme-name');

		/**
		 * Field type Doc URL.
		 *
		 * For linking to a documentation page. Displayed in the field picker modal.
		 */
		// $this->doc_url = 'FIELD_DOC_URL';

		/**
		 * Field type Tutorial URL.
		 *
		 * For linking to a tutorial resource. Displayed in the field picker modal.
		 */
		// $this->tutorial_url = 'FIELD_TUTORIAL_URL';

		/**
		 * Defaults for your custom user-facing settings for this field type.
		 */
		$this->defaults = [
            'language' => '',
        ];

		/**
		 * Strings used in JavaScript code.
		 *
		 * Allows JS strings to be translated in PHP and loaded in JS via:
		 *
		 * ```js
		 * const errorMessage = acf._e("code_block", "error");
		 * ```
		 */
		$this->l10n = [
			'error'	=> __('Error! Please enter a higher value', 'your-theme-name'),
        ];

		$this->env = [
			'url'     => site_url(str_replace(ABSPATH, '', __DIR__)), // URL to the acf-FIELD-NAME directory.
			'version' => '1.0', // Replace this with your theme or plugin version constant.
        ];

		/**
		 * Field type preview image.
		 *
		 * A preview image for the field type in the picker modal.
		 */
		$this->preview_image = $this->env['url'] . '/assets/images/field-preview-custom.png';

		parent::__construct();
	}

	/**
	 * Settings to display when users configure a field of this type.
	 *
	 * These settings appear on the ACF “Edit Field Group” admin page when
	 * setting up the field.
	 *
	 * @param array $field
	 * @return void
	 */
	public function render_field_settings($field) {
		/*
		 * Repeat for each setting you wish to display for this field type.
		 */
		acf_render_field_setting(
			$field,
			[
				'label'			=> __('Language', 'your-theme-name'),
				'instructions'	=> __('Select the language to be used in the code block', 'your-theme-name'),
				'type'			=> 'select',
				'name'			=> 'language',
                'ui'            => 1,
                'choices'       => [
                    'markup' => 'Markup',
                    'css' => 'CSS',
                    'clike' => 'C-like',
                    'javascript' => 'JavaScript',
                    'abap' => 'ABAP',
                    'abnf' => 'ABNF',
                    'actionscript' => 'ActionScript',
                    'ada' => 'Ada',
                    'agda' => 'Agda',
                    'al' => 'AL',
                    'antlr4' => 'ANTLR4',
                    'apacheconf' => 'Apache Configuration',
                    'apex' => 'Apex',
                    'apl' => 'APL',
                    'applescript' => 'AppleScript',
                    'aql' => 'AQL',
                    'arduino' => 'Arduino',
                    'arff' => 'ARFF',
                    'armasm' => 'ARM Assembly',
                    'arturo' => 'Arturo',
                    'asciidoc' => 'AsciiDoc',
                    'aspnet' => 'ASP.NET (C#)',
                    'asm6502' => '6502 Assembly',
                    'asmatmel' => 'Atmel AVR Assembly',
                    'autohotkey' => 'AutoHotkey',
                    'autoit' => 'AutoIt',
                    'avisynth' => 'AviSynth',
                    'avro-idl' => 'Avro IDL',
                    'awk' => 'AWK',
                    'bash' => 'Bash',
                    'basic' => 'BASIC',
                    'batch' => 'Batch',
                    'bbcode' => 'BBcode',
                    'bbj' => 'BBj',
                    'bicep' => 'Bicep',
                    'birb' => 'Birb',
                    'bison' => 'Bison',
                    'bnf' => 'BNF',
                    'bqn' => 'BQN',
                    'brainfuck' => 'Brainfuck',
                    'brightscript' => 'BrightScript',
                    'bro' => 'Bro',
                    'bsl' => 'BSL (1C:Enterprise)',
                    'c' => 'C',
                    'csharp' => 'C#',
                    'cpp' => 'C++',
                    'cfscript' => 'CFScript',
                    'chaiscript' => 'ChaiScript',
                    'cil' => 'CIL',
                    'cilkc' => 'Cilk/C',
                    'cilkcpp' => 'Cilk/C++',
                    'clojure' => 'Clojure',
                    'cmake' => 'CMake',
                    'cobol' => 'COBOL',
                    'coffeescript' => 'CoffeeScript',
                    'concurnas' => 'Concurnas',
                    'csp' => 'Content-Security-Policy',
                    'cooklang' => 'Cooklang',
                    'coq' => 'Coq',
                    'crystal' => 'Crystal',
                    'css-extras' => 'CSS Extras',
                    'csv' => 'CSV',
                    'cue' => 'CUE',
                    'cypher' => 'Cypher',
                    'd' => 'D',
                    'dart' => 'Dart',
                    'dataweave' => 'DataWeave',
                    'dax' => 'DA',
                    'dhall' => 'Dhall',
                    'diff' => 'Diff',
                    'django' => 'Django/Jinja2',
                    'dns-zone-file' => 'DNS zone file',
                    'docker' => 'Docker',
                    'dot' => 'DOT (Graphviz)',
                    'ebnf' => 'EBNF',
                    'editorconfig' => 'EditorConfig',
                    'eiffel' => 'Eiffel',
                    'ejs' => 'EJS',
                    'elixir' => 'Elixir',
                    'elm' => 'Elm',
                    'etlua' => 'Embedded Lua templating',
                    'erb' => 'ERB',
                    'erlang' => 'Erlang',
                    'excel-formula' => 'Excel Formula',
                    'fsharp' => 'F#',
                    'factor' => 'Factor',
                    'false' => 'False',
                    'firestore-security-rules' => 'Firestore security rules',
                    'flow' => 'Flow',
                    'fortran' => 'Fortran',
                    'ftl' => 'FreeMarker Template Language',
                    'gml' => 'GameMaker Language',
                    'gap' => 'GAP (CAS)',
                    'gcode' => 'G-code',
                    'gdscript' => 'GDScript',
                    'gedcom' => 'GEDCOM',
                    'gettext' => 'gettext',
                    'gherkin' => 'Gherkin',
                    'git' => 'Git',
                    'glsl' => 'GLSL',
                    'gn' => 'GN',
                    'linker-script' => 'GNU Linker Script',
                    'go' => 'Go',
                    'go-module' => 'Go module',
                    'gradle' => 'Gradle',
                    'graphql' => 'GraphQL',
                    'groovy' => 'Groovy',
                    'haml' => 'Haml',
                    'handlebars' => 'Handlebars',
                    'haskell' => 'Haskell',
                    'haxe' => 'Haxe',
                    'hcl' => 'HCL',
                    'hlsl' => 'HLSL',
                    'hoon' => 'Hoon',
                    'http' => 'HTTP',
                    'hpkp' => 'HTTP Public-Key-Pins',
                    'hsts' => 'HTTP Strict-Transport-Security',
                    'ichigojam' => 'IchigoJam',
                    'icon' => 'Icon',
                    'icu-message-format' => 'ICU Message Format',
                    'idris' => 'Idris',
                    'ignore' => '.ignore',
                    'inform7' => 'Inform 7',
                    'ini' => 'Ini',
                    'io' => 'Io',
                    'j' => 'J',
                    'java' => 'Java',
                    'javadoc' => 'JavaDoc',
                    'javadoclike' => 'JavaDoc-like',
                    'javastacktrace' => 'Java stack trace',
                    'jexl' => 'Jexl',
                    'jolie' => 'Jolie',
                    'jq' => 'JQ',
                    'jsdoc' => 'JSDoc',
                    'js-extras' => 'JS Extras',
                    'json' => 'JSON',
                    'json5' => 'JSON5',
                    'jsonp' => 'JSONP',
                    'jsstacktrace' => 'JS stack trace',
                    'js-templates' => 'JS Templates',
                    'julia' => 'Julia',
                    'keepalived' => 'Keepalived Configure',
                    'keyman' => 'Keyman',
                    'kotlin' => 'Kotlin',
                    'kumir' => 'KuMir (КуМир)',
                    'kusto' => 'Kusto',
                    'latex' => 'LaTeX',
                    'latte' => 'Latte',
                    'less' => 'Less',
                    'lilypond' => 'LilyPond',
                    'liquid' => 'Liquid',
                    'lisp' => 'Lisp',
                    'livescript' => 'LiveScript',
                    'llvm' => 'LLVM IR',
                    'log' => 'Log file',
                    'lolcode' => 'LOLCODE',
                    'lua' => 'Lua',
                    'magma' => 'Magma (CAS)',
                    'makefile' => 'Makefile',
                    'markdown' => 'Markdown',
                    'markup-templating' => 'Markup templating',
                    'mata' => 'Mata',
                    'matlab' => 'MATLAB',
                    'maxscript' => 'MAXScript',
                    'mel' => 'MEL',
                    'mermaid' => 'Mermaid',
                    'metafont' => 'METAFONT',
                    'mizar' => 'Mizar',
                    'mongodb' => 'MongoDB',
                    'monkey' => 'Monkey',
                    'moonscript' => 'MoonScript',
                    'n1ql' => 'N1QL',
                    'n4js' => 'N4JS',
                    'nand2tetris-hdl' => 'Nand To Tetris HDL',
                    'naniscript' => 'Naninovel Script',
                    'nasm' => 'NASM',
                    'neon' => 'NEON',
                    'nevod' => 'Nevod',
                    'nginx' => 'nginx',
                    'nim' => 'Nim',
                    'nix' => 'Nix',
                    'nsis' => 'NSIS',
                    'objectivec' => 'Objective-C',
                    'ocaml' => 'OCaml',
                    'odin' => 'Odin',
                    'opencl' => 'OpenCL',
                    'openqasm' => 'OpenQasm',
                    'oz' => 'Oz',
                    'parigp' => 'PARI/GP',
                    'parser' => 'Parser',
                    'pascal' => 'Pascal',
                    'pascaligo' => 'Pascaligo',
                    'psl' => 'PATROL Scripting Language',
                    'pcaxis' => 'PC-Axis',
                    'peoplecode' => 'PeopleCode',
                    'perl' => 'Perl',
                    'php' => 'PHP',
                    'phpdoc' => 'PHPDoc',
                    'php-extras' => 'PHP Extras',
                    'plant-uml' => 'PlantUML',
                    'plsql' => 'PL/SQL',
                    'powerquery' => 'PowerQuery',
                    'powershell' => 'PowerShell',
                    'processing' => 'Processing',
                    'prolog' => 'Prolog',
                    'promql' => 'PromQL',
                    'properties' => '.properties',
                    'protobuf' => 'Protocol Buffers',
                    'pug' => 'Pug',
                    'puppet' => 'Puppet',
                    'pure' => 'Pure',
                    'purebasic' => 'PureBasic',
                    'purescript' => 'PureScript',
                    'python' => 'Python',
                    'qsharp' => 'Q#',
                    'q' => 'Q (kdb+ database)',
                    'qml' => 'QML',
                    'qore' => 'Qore',
                    'r' => 'R',
                    'racket' => 'Racket',
                    'cshtml' => 'Razor C#',
                    'jsx' => 'React JSX',
                    'tsx' => 'React TSX',
                    'reason' => 'Reason',
                    'regex' => 'Regex',
                    'rego' => 'Rego',
                    'renpy' => 'Ren\'py',
                    'rescript' => 'ReScript',
                    'rest' => 'reST (reStructuredText)',
                    'rip' => 'Rip',
                    'roboconf' => 'Roboconf',
                    'robotframework' => 'Robot Framework',
                    'ruby' => 'Ruby',
                    'rust' => 'Rust',
                    'sas' => 'SAS',
                    'sass' => 'Sass (Sass)',
                    'scss' => 'Sass (SCSS)',
                    'scala' => 'Scala',
                    'scheme' => 'Scheme',
                    'shell-session' => 'Shell session',
                    'smali' => 'Smali',
                    'smalltalk' => 'Smalltalk',
                    'smarty' => 'Smarty',
                    'sml' => 'SML',
                    'solidity' => 'Solidity (Ethereum)',
                    'solution-file' => 'Solution file',
                    'soy' => 'Soy (Closure Template)',
                    'sparql' => 'SPARQL',
                    'splunk-spl' => 'Splunk SPL',
                    'sqf' => 'SQF: Status Quo Function (Arma 3)',
                    'sql' => 'SQL',
                    'squirrel' => 'Squirrel',
                    'stan' => 'Stan',
                    'stata' => 'Stata Ado',
                    'iecst' => 'Structured Text (IEC 61131-3)',
                    'stylus' => 'Stylus',
                    'supercollider' => 'SuperCollider',
                    'swift' => 'Swift',
                    'systemd' => 'Systemd configuration file',
                    't4-templating' => 'T4 templating',
                    't4-cs' => 'T4 Text Templates (C#)',
                    't4-vb' => 'T4 Text Templates (VB)',
                    'tap' => 'TAP',
                    'tcl' => 'Tcl',
                    'tt2' => 'Template Toolkit 2',
                    'textile' => 'Textile',
                    'toml' => 'TOML',
                    'tremor' => 'Tremor',
                    'turtle' => 'Turtle',
                    'twig' => 'Twig',
                    'typescript' => 'TypeScript',
                    'typoscript' => 'TypoScript',
                    'unrealscript' => 'UnrealScript',
                    'uorazor' => 'UO Razor Script',
                    'uri' => 'URI',
                    'v' => 'V',
                    'vala' => 'Vala',
                    'vbnet' => 'VB.Net',
                    'velocity' => 'Velocity',
                    'verilog' => 'Verilog',
                    'vhdl' => 'VHDL',
                    'vim' => 'vim',
                    'visual-basic' => 'Visual Basic',
                    'warpscript' => 'WarpScript',
                    'wasm' => 'WebAssembly',
                    'web-idl' => 'Web IDL',
                    'wgsl' => 'WGSL',
                    'wiki' => 'Wiki markup',
                    'wolfram' => 'Wolfram language',
                    'wren' => 'Wren',
                    'xeora' => 'Xeora',
                    'xml-doc' => 'XML doc (.net)',
                    'xojo' => 'Xojo (REALbasic)',
                    'xquery' => 'XQuery',
                    'yaml' => 'YAML',
                    'yang' => 'YANG',
                    'zig' => 'Zig'
                ],
            ]
		);

		// To render field settings on other tabs in ACF 6.0+:
		// https://www.advancedcustomfields.com/resources/adding-custom-settings-fields/#moving-field-setting
	}

	/**
	 * HTML content to show when a publisher edits the field on the edit screen.
	 *
	 * @param array $field The field settings and values.
	 * @return void
	 */
	public function render_field($field) {
		?>
		    <div class="your-theme-name-code-block">
                <pre class="your-theme-name-code-block__code">
                    <code class="your-theme-name-code-block__code-content 
                        <?php if (!empty($field['language'])) echo 'language-' . $field['language']; ?>"><?php echo $field['value']; ?></code>
                </pre>

                <textarea class="your-theme-name-code-block__editor" 
                    name="<?php echo esc_attr($field['name']) ?>"
                    spellcheck="false"><?php echo $field['value']; ?></textarea>
            </div>
		<?php
	}
	
	/**
	 * Enqueues CSS and JavaScript needed by HTML in the render_field() method.
	 *
	 * Callback for admin_enqueue_script.
	 *
	 * @return void
	 */
	public function input_admin_enqueue_scripts() {
		$manifest = outcomes_first_group_get_manifest();

		if ($manifest && !empty($manifest->{'acf-field-code-block.js'})) {
			wp_register_script('your-theme-name-code-block', OUTCOMES_FIRST_GROUP_BUILD_URI . $manifest->{'acf-field-code-block.js'}, [], null, true);
			wp_enqueue_script('your-theme-name-code-block');
		}

		if ($manifest && !empty($manifest->{'acf-field-code-block.css'})) {
			wp_register_style('your-theme-name-code-block', OUTCOMES_FIRST_GROUP_BUILD_URI . $manifest->{'acf-field-code-block.css'}, []);
			wp_enqueue_style('your-theme-name-code-block');
		}
	}
}
