import * as Yup from 'yup';

export const SigninSchema = Yup.object().shape({
    email: Yup.string().email('Email Invalid').max(255).required('Email requis'),
    password: Yup.string().required('No password provided.') 
      .min(8, 'Password is too short - should be 8 chars minimum.')
      .matches(/[a-zA-Z]/, 'Password can only contain Latin letters.'),
  });