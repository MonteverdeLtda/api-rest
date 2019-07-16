<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Monteverde - SDK - VUE Dashboard</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/vue-router/3.0.2/vue-router.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<script>
// Esto se llama con los resultados de Mv.getLoginStatus().
function statusChangeCallback(response) {
	console.log('statusChangeCallback');
	// El objeto de respuesta se devuelve con un campo de estado que permite a
	// la aplicación conocer el estado actual de inicio de sesión de la persona.
	// Los documentos completos sobre el objeto de respuesta se pueden encontrar en la documentación.
	// para Mv.getLoginStatus().
	if (response.status === 'connected') {
		testAPI();
	} else if (response.status === 'connected') {
		testAPI();
	} else {
		// La persona no ha iniciado sesión en su aplicación o no podemos decírselo.
		console.log('La persona no ha iniciado sesión en su aplicación o no podemos decírselo.');
		document.getElementById('status').innerHTML = 'La persona no ha iniciado sesión en su aplicación o no podemos decírselo.';
	}
}
// Esta función se llama cuando alguien termina con el inicio de sesión
// Botón. Ver el controlador onlogin adjunto a él en la muestra
// código abajo.
function checkLoginState() {
	console.log('checkLoginState');
	Mv.getLoginStatus(function(response) {
		statusChangeCallback(response);
	});
}

  // Load the SDK asynchronously
(function () {
	var s = document.createElement('script');
	s.type = 'text/javascript';
	s.async = true;
	s.src = 'https://connect.monteverdeltda.com/';
	var x = document.getElementsByTagName('script')[0];
	x.parentNode.insertBefore(s, x);
})();

window.MonteverdeAPIInit = function() {
	Mv.init({
		clientId   : '10000000001',
		version     : '2.0.0'
	});
	// Ahora que hemos inicializado el SDK de JavaScript, llamamos
	// Mv.getLoginStatus(). Esta función obtiene el estado del
	// persona que visita esta página y puede devolver uno de los tres estados a
	// la devolución de llamada que proporcionas. Ellos pueden ser:
	//
	// 1. Inicia sesión en tu aplicación ('connected')
	// 2. Ha iniciado sesión en Facebook, pero no en su aplicación ('not_authorized')
	// 3. No ha iniciado sesión en Facebook y no puede saber si están conectados
	// tu aplicación o no.
	// Estos tres casos se manejan en la función de devolución de llamada.

    Mv.getLoginStatus(function(response) {
		console.log('Mv.getLoginStatus Front: ');
		console.log(response);
		statusChangeCallback(response);
    });
};

// Aquí ejecutamos una prueba muy simple después de que el inicio de sesión sea exitoso.
// Consulte statusChangeCallback() para saber cuándo se realiza esta llamada.
function testAPI() {
	document.getElementById('status').innerHTML = 'Bienvenido, esta es toda la informacion a la que tienes acceso... .';
	
	

	var api = Mv.api;

	api.interceptors.response.use(function (response) {
	  if (response.headers['x-xsrf-token']) {
		document.cookie = 'XSRF-TOKEN=' + response.headers['x-xsrf-token'] + '; path=/';
	  }
	  return response;
	});

	var util = {
	  methods: {
		resolve: function (path, obj) {
		  return path.reduce(function(prev, curr) {
			return prev ? prev[curr] : undefined
		  }, obj || this);
		},
		getDisplayColumn: function (columns) {
		  var index = -1;
		  var names = ['name', 'title', 'description', 'username'];
		  for (var i in names) {
			index = columns.indexOf(names[i]);
			if (index >= 0) {
			  return names[i];
			}
		  }
		  return columns[0];
		},
		getPrimaryKey: function (properties) {
		  for (var key in properties) {
			if (properties[key]['x-primary-key']) {
			  return key;
			}
		  }
		  return false;
		},
		getReferenced: function (properties) {
		  var referenced = [];
		  for (var key in properties) {
			if (properties[key]['x-referenced']) {
			  for (var i = 0; i < properties[key]['x-referenced'].length; i++) {
				referenced.push(properties[key]['x-referenced'][i].split('.'));
			  }
			}
		  }
		  return referenced;
		},
		getReferences: function (properties) {
		  var references = {};
		  for (var key in properties) {
			if (properties[key]['x-references']) {
			  references[key] = properties[key]['x-references'];
			} else {
			  references[key] = false; 
			}
		  }
		  return references;
		},
		getProperties: function (action, subject, definition) {
		  if (action == 'list') {
			path = ['components', 'schemas', action + '-' + subject, 'properties', 'records', 'items', 'properties'];
		  } else {
			path = ['components', 'schemas', action + '-' + subject, 'properties'];
		  }
		  return this.resolve(path, definition);
		}
	  }
	};

	var orm = {
	  methods: {
		readRecord: function () {
		  this.id = this.$route.params.id;
		  this.subject = this.$route.params.subject;
		  this.record = null;
		  var self = this;
		  api.get('/records/' + this.subject + '/' + this.id).then(function (response) {
			self.record = response.data;
		  }).catch(function (error) {
			console.log(error);
		  });
		},
		readRecords: function () {
		  this.subject = this.$route.params.subject;
		  this.records = null;
		  var url = '/records/' + this.subject;
		  var params = [];
		  for (var i=0;i<this.join.length;i++) {
			params.push('join='+this.join[i]);
		  }        
		  if (this.field) {
			params.push('filter='+this.field+',eq,'+this.id);
		  }        
		  if (params.length>0) {
			url += '?'+params.join('&');
		  }
		  var self = this;
		  api.get(url).then(function (response) {
			self.records = response.data.records;
		  }).catch(function (error) {
			console.log(error);
		  });
		},
		readOptions: function() {
		  this.options = {};
		  var self = this;
		  for (var key in this.references) {
			var subject = this.references[key];
			if (subject !== false) {
			  var properties = this.getProperties('list', subject, this.definition);
			  var displayColumn = this.getDisplayColumn(Object.keys(properties));
			  var primaryKey = this.getPrimaryKey(properties);
			  api.get('/records/' + subject + '?include=' + primaryKey + ',' + displayColumn).then(function (subject, primaryKey, displayColumn, response) {
				self.options[subject] = response.data.records.map(function (record) {
				  return {key: record[primaryKey], value: record[displayColumn]};
				});
				self.$forceUpdate();
			  }.bind(null, subject, primaryKey, displayColumn)).catch(function (error) {
				console.log(error);
			  });
			}
		  }
		},
		updateRecord: function () {
		  api.put('/records/' + this.subject + '/' + this.id, this.record).then(function (response) {
			console.log(response.data);
		  }).catch(function (error) {
			console.log(error);
		  });
		  router.push({name: 'List', params: {subject: this.subject}});
		},
		initRecord: function () {
		  this.record = {};
		  for (var key in this.properties) {
			if (!this.properties[key]['x-primary-key']) {
			  if (this.properties[key].default) {
				this.record[key] = this.properties[key].default;
			  } else {
				this.record[key] = '';
			  }
			}
		  }
		},
		createRecord: function() {
		  var self = this;
		  api.post('/records/' + this.subject, this.record).then(function (response) {
			self.record.id = response.data;
		  }).catch(function (error) {
			console.log(error);
		  });
		  router.push({name: 'List', params: {subject: this.subject}});
		},
		deleteRecord: function () {
		  api.delete('/records/' + this.subject + '/' + this.id).then(function (response) {
			console.log(response.data);
		  }).catch(function (error) {
			console.log(error);
		  });
		  router.push({name: 'List', params: {subject: this.subject}});
		}
	  }
	};

	Vue.component('menu-component', {
	  mixins: [util, orm],
	  template: '#menu',
	  props: ['subjects']
	})

	var Home = Vue.extend({
	  mixins: [util],
	  template: '#home'
	});

	var List = Vue.extend({
	  mixins: [util, orm],
	  template: '#list',
	  data: function () {
		return {
		  records: null,
		  subject: this.$route.params.subject,
		  field: this.$route.params.field,
		  id: this.$route.params.id      
		};
	  },
	  props: ['definition'],
	  created: function () {
		this.readRecords();
	  },
	  computed: {
		related: function () {
		  return (this.referenced.filter(function (value) { return value; }).length > 0);
		},
		join: function () {
		  return Object.values(this.references).filter(function (value) { return value; });
		},
		properties: function () {
		  return this.getProperties('list', this.subject, this.definition);
		},
		references: function () {
		  return this.getReferences(this.properties);
		},
		referenced: function () {
		  return this.getReferenced(this.properties);
		},
		primaryKey: function () {
		  return this.getPrimaryKey(this.properties);
		}
	  },
	  methods: {
		referenceText(subject, record) {
		  var properties = this.getProperties('read', subject, this.definition);
		  var displayColumn = this.getDisplayColumn(Object.keys(properties));
		  return record[displayColumn];
		},
		referenceId(subject, record) {
		  var properties = this.getProperties('read', subject, this.definition);
		  var primaryKey = this.getPrimaryKey(properties);
		  return record[primaryKey];
		}
	  }
	});

	var View = Vue.extend({
	  mixins: [util, orm],
	  template: '#view',
	  props: ['definition'],
	  data: function () {
		return {
		  id: this.$route.params.id,
		  subject: this.$route.params.subject,
		  record: null
		};
	  },
	  created: function () {
		this.readRecord();
	  },
	  computed: {
		properties: function () {
		  return this.getProperties('read', this.subject, this.definition);
		}
	  },
	  methods: {   
	  }
	});

	var Edit = Vue.extend({
	  mixins: [util, orm],
	  template: '#update',
	  props: ['definition'],
	  data: function () {
		return {
		  id: this.$route.params.id,
		  subject: this.$route.params.subject,
		  record: null,
		  options: {}
		};
	  },
	  created: function () {
		this.readRecord();
		this.readOptions();
	  },
	  computed: {
		properties: function () {
		  return this.getProperties('update', this.subject, this.definition);
		},
		primaryKey: function () {
		  return this.getPrimaryKey(this.properties);
		},
		references: function () {
		  return this.getReferences(this.properties);
		},
	  },
	  methods: {
	  }
	});

	var Delete = Vue.extend({
	  mixins: [util, orm],
	  template: '#delete',
	  data: function () {
		return {
		  id: this.$route.params.id,
		  subject: this.$route.params.subject
		};
	  },
	  methods: {
	  }
	});

	var Add = Vue.extend({
	  mixins: [util, orm],
	  template: '#create',
	  props: ['definition'],
	  data: function () {
		return {
		  id: this.$route.params.id,
		  subject: this.$route.params.subject,
		  record: null,
		  options: {}
		};
	  },
	  created: function () {
		this.initRecord();
		this.readOptions();
	  },
	  computed: {
		properties: function () {
		  return this.getProperties('create', this.subject, this.definition);
		},
		primaryKey: function () {
		  return this.getPrimaryKey(this.properties);
		},
		references: function () {
		  return this.getReferences(this.properties);
		}
	  },
	  methods: {
	  }
	});

	var router = new VueRouter({
	  linkActiveClass: 'active',
	  routes:[
		{ path: '/', component: Home},
		{ path: '/:subject/create', component: Add, name: 'Add'},
		{ path: '/:subject/read/:id', component: View, name: 'View'},
		{ path: '/:subject/update/:id', component: Edit, name: 'Edit'},
		{ path: '/:subject/delete/:id', component: Delete, name: 'Delete'},
		{ path: '/:subject/list', component: List, name: 'List'},
		{ path: '/:subject/list/:field/:id', component: List, name: 'Filter'}
	  ]
	});
	app = new Vue({
	  router: router,
	  data: function () {
		return {definition: null};
	  },
	  created: function () {
		var self = this;
		api.get('/openapi').then(function (response) {
		  self.definition = response.data;
		}).catch(function (error) {
		  console.log(error);
		});
	  }
	}).$mount('#app');
}
</script>


<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h3>Monteverde - SDK - VUE Dashboard</h3>
    </div>
    <div class="col-md-8">
		<div id="status">
		</div>
	</div>
    <div class="col-md-4">
		<mv:login-button scope="email" onlogin="checkLoginState();">
		</mv:login-button>
    </div>
  </div>
  <main id="app">
    <div class="row">
      <div class="col-md-3">
        <menu-component v-if="definition!==null" :subjects="definition.tags"></menu-component>
      </div>
      <div class="col-md-9">
        <router-view :key="$route.fullPath" v-if="definition!==null" :definition="definition"></router-view>
      </div>
    </div>
  </main>
</div>

<template id="menu">
  <div v-if="subjects!==null" class="nav flex-column nav-pills">
      <router-link v-for="subject in subjects" v-bind:to="{name: 'List', params: {subject: subject.name}}" class="nav-link" :key="subject.name">
        {{ subject.name }}
      </router-link>
  </div>
</template>

<template id="home">
  <div>Nothing</div>
</template>

<template id="list">
  <div>
    <h2>{{ subject }}</h2>
    <p>
      <router-link class="btn btn-primary" v-bind:to="{name: 'Add', params: {subject: subject}}">
        Add
      </router-link>
    </p>
    <div class="card bg-light" v-if="field"><div class="card-body">
      <div style="float:right;"><router-link v-bind:to="{name: 'List', params: {subject: subject}}">Clear filter</router-link></div>
      <p class="card-text">Filtered by: {{ field }} = {{ id }}</p>
    </div></div>
    <p v-if="records===null">Loading...</p>
    <table v-else class="table">
      <thead>
        <tr>
          <th v-for="value in Object.keys(properties)">{{ value }}</th>
          <th v-if="related">related</th>
          <th v-if="primaryKey">actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="record in records">
          <template v-for="(value, key) in record">
            <td v-if="references[key] !== false">
              <router-link v-bind:to="{name: 'View', params: {subject: references[key], id: referenceId(references[key], record[key])}}">{{ referenceText(references[key], record[key]) }}</router-link>
            </td>
            <td v-else>{{ value }}</td>
          </template>
          <td v-if="related">
            <template v-for="(relation, i) in referenced">
              <router-link v-bind:to="{name: 'Filter', params: {subject: relation[0], field: relation[1], id: record[primaryKey]}}">{{ relation[0] }}</router-link>&nbsp;
            </template>
          </td>
          <td v-if="primaryKey" style="padding: 6px; white-space: nowrap;">
            <router-link class="btn btn-secondary btn-sm" v-bind:to="{name: 'View', params: {subject: subject, id: record[primaryKey]}}">View</router-link>
            <router-link class="btn btn-secondary btn-sm" v-bind:to="{name: 'Edit', params: {subject: subject, id: record[primaryKey]}}">Edit</router-link>
            <router-link class="btn btn-danger btn-sm" v-bind:to="{name: 'Delete', params: {subject: subject, id: record[primaryKey]}}">Delete</router-link>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<template id="create">
  <div>
    <h2>{{ subject }} - add</h2>
    <form v-on:submit="createRecord">
      <template v-for="(value, key) in record">
        <div class="form-group">
          <label v-bind:for="key">{{ key }}</label>
          <input v-if="references[key] === false" class="form-control" v-bind:id="key" v-model="record[key]" :disabled="key === primaryKey" />
          <select v-else class="form-control" v-bind:id="key" v-model="record[key]">
            <option value=""></option>
            <option v-for="option in options[references[key]]" v-bind:value="option.key">{{ option.value }}</option>
          </select>
        </div>
      </template>
      <button type="submit" class="btn btn-primary">Create</button>
      <router-link class="btn btn-primary" v-bind:to="{name: 'List', params: {subject: subject}}">Cancel</router-link>
    </form>
  </div>
</template>

<template id="view">
  <div>
    <h2>{{ subject }} - view</h2>
    <p v-if="record===null">Loading...</p>
    <dl v-else>
      <template v-for="(value, key) in record">
        <dt>{{ key }} </dt>
        <dd>{{ value }}</dd>
      </template>
    </dl>
  </div>
</template>

<template id="update">
  <div>
    <h2>{{ subject }} - edit</h2>
    <p v-if="record===null">Loading...</p>
    <form v-else v-on:submit="updateRecord">
      <template v-for="(value, key) in record">
        <div class="form-group">
          <label v-bind:for="key">{{ key }}</label>
          <input v-if="references[key] === false" class="form-control" v-bind:id="key" v-model="record[key]" :disabled="key === primaryKey" />
          <select v-else-if="!options[references[key]]" class="form-control" disabled>
            <option value="" selected>Loading...</option>
          </select>
          <select v-else class="form-control" v-bind:id="key" v-model="record[key]">
            <option value=""></option>
            <option v-for="option in options[references[key]]" v-bind:value="option.key">{{ option.value }}</option>
          </select>
        </div>
      </template>
      <button type="submit" class="btn btn-primary">Save</button>
      <router-link class="btn btn-secondary" v-bind:to="{name: 'List', params: {subject: subject}}">Cancel</router-link>
    </form>
  </div>
</template>

<template id="delete">
  <div>
    <h2>{{ subject }} delete #{{ id }}</h2>
    <form v-on:submit="deleteRecord">
      <p>The action cannot be undone.</p>
      <button type="submit" class="btn btn-danger">Delete</button>
      <router-link class="btn btn-secondary" v-bind:to="{name: 'List', params: {subject: subject}}">Cancel</router-link>
    </form>
  </div>
</template>

<script>
</script>

</body>
</html>
