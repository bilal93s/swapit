import * as Yup from 'yup';

export const SignupSchema = Yup.object().shape({
    login: Yup.string()
      .min(2, 'Too Short!')
      .max(50, 'Too Long!')
      .required('Required'),
    lastName: Yup.string()
      .min(2, 'Too Short!')
      .max(50, 'Too Long!'), 
    email: Yup.string().email('Email Invalid').max(255).required('Email requis'),
    password: Yup.string().required('No password provided.') 
      .min(8, 'Password is too short - should be 8 chars minimum.')
      .matches(/[a-zA-Z]/, 'Password can only contain Latin letters.'),
    password_confirm: Yup.string()
      .oneOf([Yup.ref('password'), null], 'Passwords must match')
      .required('Required'),
    
  });