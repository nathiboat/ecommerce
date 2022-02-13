import Vue from 'vue'
/* add fontawesome core */
import { library } from '@fortawesome/fontawesome-svg-core'

/* add some free styles */
import { faUserSecret } from '@fortawesome/free-solid-svg-icons'



library.add(faUserSecret)

Vue.use(library)
