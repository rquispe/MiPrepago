﻿using System;
using System.Collections.Generic;
using System.Linq;
using System.Runtime.Serialization;
using System.Web;

namespace u201522215.Errores
{
    [DataContract]
    public class RepetidoException
    {
        [DataMember]
        public string codigo { get; set; }
        [DataMember]
        public string descripcion { get; set; }
    }

}