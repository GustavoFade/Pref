
import { Switch, Route } from 'react-router-dom';
import React from 'react';

import Login from '../pages/Login';
import NewUser from '../pages/NewUser';

function Routes() {
  return (
    <Switch>
      <Route path="/"exact component={Login} />
      <Route path="/newuser" component={NewUser} />
    </Switch>
  )
}

export default Routes;