import IndexField from './components/IndexField'
import DetailField from './components/DetailField'
import FormField from './components/FormField'

Nova.booting((app, store) => {
  app.component('index-secret-field', IndexField)
  app.component('detail-secret-field', DetailField)
  app.component('form-secret-field', FormField)
})
